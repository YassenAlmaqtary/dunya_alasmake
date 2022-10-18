<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CookRequest;
use App\Models\Cook;
use App\Traits\GeneralTrait;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CookController extends Controller
{
    use GeneralTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cooks=Cook::All();
        return  view('admin.cook.index',compact('cooks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $flags = false;
       return  view('admin.cook.create',compact('flags'));
    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CookRequest $request)
    {
        
      try{
        $cook_name_exsite = Cook::select('id', 'name')->where('name', $request->name)->count();
            if ($cook_name_exsite > 0) {
                return  redirect()->route('admin.cook')->with(['error' => 'الاسم موجود من قبل']);
            }
           $filePath=uploadImage('cooks', $request->image);
           $details = null;
           if ($request->has('details')) {
               $details = $request->details;
           }
            DB::beginTransaction();                      
            Cook::create([
              'name'=>$request->name,
              'price'=>$request->price,
              'details'=>$details,
              'image'=>$filePath,
            ]);
            DB::commit();
            return  redirect()->route('admin.cook')->with(['success' => 'تم الحفظ بنجاح']);
      }
      catch(Exception $exp){
         removeImage('/dashboard/uploads/cooks/'. $filePath);
         return  redirect()->route('admin.product')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
      }


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            $flags = true;
            $cook = Cook::find($id);
            if (!$cook)
                return redirect()->route('admin.cook')->with(['error' => ' هذا الطبخة غير موجود او تم حذفة من قبل']);
            return view('admin.cook.create', compact('cook', 'flags'));
        } catch (Exception $exp) {

            return  redirect()->route('admin.cook')->with(['error' => 'حدث خطا ما يرجاء المحاوله لاحقا']);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CookRequest $request, $id)
    {
        try {
            $cook = Cook::find($id);
            if (!$cook){
                return redirect()->route('admin.cook')->with(['error' => ' هذا الطبخة غير موجود اوتم حذفة من قبل']);
            }
            $cook_name_exsite = Cook::select('id', 'name')->where('name', $request->name)->first();
        
            if ($cook_name_exsite!=null and $cook_name_exsite->id!=$id) {
                return  redirect()->route('admin.cook')->with(['error' => 'الاسم موجود من قبل']);
            }    

            $filePath = $cook->image;
            $details = $cook->details;
            if ($request->has('image')) {
                removeImage('/dashboard/uploads/cooks/'. $filePath);
                $filePath = uploadImage('cooks', $request->image);
            }

            if ($request->has('details')) {
                $details = $request->details;
            }

            DB::beginTransaction();
            Cook::where('id', $id)->update(
                [
                    'name' => $request->name,
                    'image' => $filePath,
                    'price' => $request->price,
                    'details' => $details,
                    'updated_at' => Carbon::now(),
                ]
            );
            DB::commit();
            return  redirect()->route('admin.cook')->with(['success' => 'تم التحديث بنجاح']);
        } catch (Exception $exp) {
            DB::rollBack();
            removeImage('/dashboard/uploads/cooks/'. $filePath);
            return  redirect()->route('admin.cook')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        try {
            
            $id= $request->id;
            $cook =Cook::find($id);
            if (!$cook)
               $this->returnError(404,' هذا المنتج غير موجود اوتم حذفة من قبل');
            $filePath = $cook->image;
            if ($filePath != null) {
                removeImage('/dashboard/uploads/cooks/'. $filePath);
            }
            $cook->delete();
            return $this->returnData ('success','200','تم الحذف بنجاح');
        } catch (Exception $exp) {
            $this->returnError(500,'حدث خطا ما برجاء المحاوله لاحقا');
          
        }
    }
    

    public function changeStause(Request $request)  {
   
        try{
             // $json = file_get_contents("php://input"); // json string
            // $object = json_decode($json);
            // return $object->statu;
        
        Cook::where('id', $request->cook_id)->update(
                [
                   'status' =>$request->statu,
                   'updated_at' => Carbon::now(),
                ]
            ); 
            
            return $this->returnData('success','200','تم التعديل بنجاح');;
        }
        catch(Exception $exp){
            $this->returnError(500,'حدث خطا ما برجاء المحاوله لاحقا');
        }
      
    
        }
    }



