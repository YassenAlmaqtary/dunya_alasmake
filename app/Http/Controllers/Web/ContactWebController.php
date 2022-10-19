<?php

namespace App\Http\Controllers\web;

use App\Events\SubscriptBoradcust;
use App\Http\Controllers\Controller;
use App\Http\Requests\SubscriptRequset;
use App\Models\Subscript;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Redirect;

class ContactWebController extends Controller
{
   

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('web.contact-use');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SubscriptRequset $request)
    {
        try{
            $data=$request->except('_token');
           $data= Subscript::create($data);
           $array=[
            'id'=>$data->id,
            'name'=>$data->name,
            'phone'=>$data->phone,
            'email'=>$data->email,
            'address'=>$data->address,
            'message'=>$data->message,
            'time'=>time_elapsed_string($data->updated_at),
            'created_at'=>$data->created_at,
            'updated_at'=>$data->updated_at,
            'count'=>Subscript::count(),
            'icon'=>asset('asset/dashboard/assets/img/messages-icon.png'),
            'route'=>route('admin.subscript.show',$data->id),
        ];
        // Convert array into an object
        $subscript = json_decode(json_encode($array));
        event(new SubscriptBoradcust($subscript));
       ///Notification::send($subscript, new SubScriptNotifiction($subscript));
       return Redirect::back()->with(['success' => 'تم ارسال تعليقك بنجاح']);
        }
        catch(Exception $exp){
            return Redirect::back()->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
            
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
