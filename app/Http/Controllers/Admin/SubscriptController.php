<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Subscript;
use App\Traits\GeneralTrait;
use Exception;
use Illuminate\Http\Request;

class SubscriptController extends Controller
{
    use GeneralTrait;
    public  function index(){
        
    try{
      
     
    $subscripts= Subscript::all();

    
    return view('admin.subscript.index',compact('subscripts'));
    
    }
    catch(Exception $exp){
       
        return  redirect()->route('admin.subscript')->with(['error' => 'حدث خطا ما الرجاء المحاوله لاحقا']);

    }     

    }



    public function show($id){

    try{
      $subscript=Subscript::find($id);
        
      return view('admin.subscript.show',compact('subscript'));

    }
    catch(Exception $exp){
        
        return  redirect()->route('admin.subscript')->with(['error' => 'حدث خطا ما الرجاء المحاوله لاحقا']);
        
    }
    }



    public function destroy(Request $request)
    {
        try {

            
            $id= $request->id;
            $subscript =Subscript::find($id);
            if (!$subscript)
               $this->returnError(404,' هذا المنتج غير موجود اوتم حذفة من قبل');
            
            $subscript->delete();
            return $this->returnData ('success','200','تم الحذف بنجاح');
        } catch (Exception $exp) {
    
            $this->returnError(500,'حدث خطا ما الرجاء المحاوله لاحقا');
          
        }
    }

    
    
}
