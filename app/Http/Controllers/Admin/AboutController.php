<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AboutRequset;
use App\Models\About;
use App\Traits\GeneralTrait;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AboutController extends Controller
{
    use GeneralTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $abouts=About::get();
        return view('admin.about.index',compact('abouts'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $flags = false;
        return view('admin.about.create', compact( 'flags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AboutRequset $request)
    {
       try{
          $request->request->add(['created_at' => Carbon::now(),'updated_at' => Carbon::now()]);
        $count= About::get()->count();
        if($count>0){
            return  redirect()->route('admin.apout')->with(['error' => 'لايمكن ادخال اكثر من وصف']);
        }
        $data=$request->except('_token');

         DB::beginTransaction();
         About::insert($data);
         db::commit();
        return redirect()->route('admin.apout')->with(['success' => 'تم الحفظ بنجاح']);

       }
       catch(Exception $exp){  
         DB::rollBack();
          return  redirect()->route('admin.apout')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
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
        try{
            $flags = true;
            $about = About::find($id);
            if (!$about)
            return redirect()->route('admin.apout')->with(['error' => ' هذا الوصف غير موجود او تم حذفة من قبل']);
            return view('admin.about.create', compact('about', 'flags'));
        }
        catch(Exception $exp){
            return  redirect()->route('admin.apout')->with(['error' => 'حدث خطا ما يرجاء المحاوله لاحقا']);
        }
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AboutRequset $request, $id)
    {
        try{
            $about = About::find($id);
            if (!$about){
                return redirect()->route('admin.apout')->with(['error' => ' هذا الوصف غير موجود اوتم حذفة من قبل']);
            }  
            $request->request->add(['updated_at' => Carbon::now()]);
            $data=$request->except('_token','_method');
            DB::beginTransaction();
            About::where('id', $about->id)->update($data);
            db::commit();
           return redirect()->route('admin.apout')->with(['success' => 'تم التعديل بنجاح']);
        }
        catch(Exception $exp){
            DB::rollBack();
            return $exp;
            return  redirect()->route('admin.apout')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
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
            $about =About::find($id);
            if (!$about)
               $this->returnError(404,' هذا الوصف غير موجود اوتم حذفة من قبل');
          
            $about->delete();
            return $this->returnData ('success','200','تم الحذف بنجاح');
        } catch (Exception $exp) {
            $this->returnError(500,'حدث خطا ما برجاء المحاوله لاحقا');
          
        }



    }

    public function changeStause(Request $request)  {
   
        try{

            About::where('id', $request->about_id)->update(
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
