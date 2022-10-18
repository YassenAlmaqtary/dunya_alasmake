<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Cook;

use Illuminate\Http\Request;

class CookWebController extends Controller
{
    
   public function getallcooks(){
    
   $cooks=Cook::all()->where('status','1');
   return view('web.cook',compact('cooks'));

   }
  
   public function show($id){
      $detail=Cook::where('id',$id)->select('id','name','image','details')->first(); 
     return  view('web.detail',compact('detail'));
  }



}
