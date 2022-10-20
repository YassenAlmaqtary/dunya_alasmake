<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CustomerRequest;
use App\Models\Customer;
use App\Traits\GeneralTrait;
use App\Traits\HelperTrait;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{
    use GeneralTrait;
    use HelperTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $customers=Customer::all();
         return view('admin.customer.index',compact('customers'));

     
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $flags = false;
        return view('admin.customer.create',compact('flags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CustomerRequest $request)
    {
        try{
            $email_customer_exsite=Customer::select('id','email')->where('email',$request->email)->count();
            if($email_customer_exsite){
                return  redirect()->route('admin.customer')->with(['error' => 'البريد الالكتروني موجود من قبل']);
            }
            $phone_customer_exsite=Customer::select('id','phone')->where('phone',$request->phone)->count();
            if($phone_customer_exsite){
                return  redirect()->route('admin.customer')->with(['error' => 'الهاتف  موجود من قبل']);
            }
        
            $filePath = null;
            if ($request->has('image')) {
                $filePath = $this->uploadImage('customers', $request->image);
            }
            DB::beginTransaction();
            Customer::insert(
                [
                    'name' => $request->name,
                    'email'=>$request->email,
                    'phone'=>$request->phone,
                    'address'=>$request->address,
                    'image' =>$filePath,
                    'gender'=>$request->gender,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),

                ]
            );
            DB::commit();
            return  redirect()->route('admin.customer')->with(['success' => 'تم الحفظ بنجاح']);
        } catch (Exception $exp) {
            DB::rollBack();
            $this->removeImage('/dashboard/uploads/customers/'.$filePath);
            return  redirect()->route('admin.customer')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
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
            $customer=Customer::find($id);
            if (!$customer)
             return redirect()->route('admin.customer')->with(['error' => ' هذا القسم غير موجود اوتم حذفة من قبل']);
            
            return view('admin.customer.create',compact('customer','flags'));
        }
        catch(Exception $exp){

            return  redirect()->route('admin.customer')->with(['error' => 'حدث خطا ما يرجاء المحاوله لاحقا']);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CustomerRequest $request, $id)
    {
        try{
            
            
            $customer=Customer::find($id);
            if(!$customer){
             return redirect()->route('admin.customer')->with(['error' => ' هذا العميل غير موجود اوتم حذفة من قبل']);
            }
             $email_customer_exsite=Customer::select('id','email')->where(['email'=>$request->email])->first();
            if($email_customer_exsite->id!=$id){
                return  redirect()->route('admin.customer')->with(['error' => 'البريد الالكتروني موجود من قبل']);
            }
            $phone_customer_exsite=Customer::select('id','phone')->where('phone',$request->phone)->first();
            if($phone_customer_exsite->id!=$id){
                return  redirect()->route('admin.customer')->with(['error' => 'الهاتف  موجود من قبل']);
            }
            
             $filePath = $customer->image;
              
             if($request->has('image')){
              if( $filePath!=null){
                $this->removeImage('/dashboard/uploads/customers/'.$filePath);
               $filePath = $this->uploadImage('customers', $request->image);
              }
              else{
                $filePath = $this->uploadImage('customers', $request->image);
              }
              
             }
             DB::beginTransaction(); 
             Customer::where('id',$id)->update( [
              'name' => $request->name,
              'email'=>$request->email,
              'phone'=>$request->phone,
              'address'=>$request->address,
              'image' => $filePath,
              'gender'=>$request->gender,
              'updated_at' => Carbon::now(),
              ]
             );
             DB::commit();
             return  redirect()->route('admin.customer')->with(['success' => 'تم التحديث بنجاح']);
  
         }
         catch(Exception $exp){
            DB::rollBack();
            $this-> removeImage('/dashboard/uploads/customers/'.$filePath);
            
          return  redirect()->route('admin.customer')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
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
            $customer=Customer::find($id);
            if(!$customer)
            $this->returnError(404,' هذا العميل غير موجود اوتم حذفة من قبل');
           
            

            $filePath = $customer->image_path;
            if($filePath!=null){
                $this->removeImage('/dashboard/uploads/customers/'.$filePath);
            }
            
            $customer->delete();
            return $this->returnData ('success','200','تم الحذف بنجاح');

        }
        catch(Exception $exp){
            $this->returnError(500,'حدث خطا ما برجاء المحاوله لاحقا');
        }
    }

    public function changeStause(Request $request)  {
   
        try{
             // $json = file_get_contents("php://input"); // json string
            // $object = json_decode($json);
            // return $object->statu;
            Customer::where('id', $request->customer_id)->update(
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
