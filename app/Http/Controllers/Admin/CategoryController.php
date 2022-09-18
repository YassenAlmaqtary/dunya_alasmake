<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use App\Traits\GeneralTrait;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    use GeneralTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public $flags=false;

    public function index()
    {
       $categorys=Category::all();

        return  view('admin.category.index',compact('categorys'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $flags=false;
        return view('admin.category.create',compact('flags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Responser
     */
    public function store(CategoryRequest $request)
    {
        try {
            $Category_name_exsite= Category::select('id','name')->where('name',$request->name)->count();
            if($Category_name_exsite>0){
              return  redirect()->route('admin.categorys')->with(['error' => 'الاسم موجود من قبل']);
            }
            
            $filePath =null;
            if ($request->has('icon')) {
                $filePath = uploadImage('categorys', $request->icon);
            }
           
            DB::beginTransaction();
            Category::insert(
                [
                    'name' => $request->name,
                    'icon' =>$filePath,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),

                ]
            );
            DB::commit();
            return  redirect()->route('admin.categorys')->with(['success' => 'تم الحفظ بنجاح']);
        } catch (Exception $exp) {
            DB::rollBack();
            removeImage('/dashboard/uploads/categorys/'.$filePath);
            return  redirect()->route('admin.categorys')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
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
            $flags=true;
            $category=Category::find($id);
            if (!$category)
             return redirect()->route('admin.categorys')->with(['error' => ' هذا القسم غير موجود اوتم حذفة من قبل']);
            
            return view('admin.category.create',compact('category','flags'));
        }
        catch(Exception $exp){
        
            return  redirect()->route('admin.categorys')->with(['error' => 'حدث خطا ما يرجاء المحاوله لاحقا']);
        }
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, $id)
    {
       try{
        
          $category=Category::find($id);
          if(!$category){
           return redirect()->route('admin.categorys')->with(['error' => ' هذا القسم غير موجود اوتم حذفة من قبل']);
          }
         $Category_name_exsite=Category::select('id','name')->where(['name'=>$request->name])->first();
    
          if($Category_name_exsite->id!=$id){
              return  redirect()->route('admin.categorys')->with(['error' => 'الاسم موجود من قبل']);
          }
          
           $filePath = $category->icon;
            
           if($request->has('icon')){
            if( $filePath!=null){
             removeImage('/dashboard/uploads/categorys/'.$filePath);
             $filePath = uploadImage('categorys', $request->icon);
            }
            else{
              $filePath = uploadImage('categorys', $request->icon);
            }
            
           } 
           DB::beginTransaction();
           Category::where('id',$id)->update( [
            'name' => $request->name,
            'icon' => $filePath,
            'updated_at' => Carbon::now(),
            ]
           );
           DB::commit();
           return  redirect()->route('admin.categorys')->with(['success' => 'تم التحديث بنجاح']);

       }
       catch(Exception $exp){
         DB::rollBack();
            removeImage('/dashboard/uploads/categorys/'.$filePath);
        
        return  redirect()->route('admin.categorys')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
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
        try{
            $id= $request->id;
            $category=Category::find($id);
            if(!$category)
            $this->returnError(404,' هذا القسم غير موجود اوتم حذفة من قبل');
            $products=$category->products;
            
            if($products){
                foreach($products as $product){
                    removeImage('/dashboard/uploads/products/'.$product->image);
                    $product->delete();
                }
            }

            $filePath = $category->icon;
            if($filePath!=null){
            removeImage('/dashboard/uploads/categorys/'.$filePath);
            }
            
            $category->delete();
            return $this->returnData ('success','200','تم الحذف بنجاح');

        }
        catch(Exception $exp){
            $this->returnError(500,'حدث خطا ما برجاء المحاوله لاحقا');
        }

    }
}
