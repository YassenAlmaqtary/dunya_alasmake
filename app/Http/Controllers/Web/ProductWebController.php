<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductWebController extends Controller
{

       public function index(){
        return view('web.home');
       }


        public function getProduct($catgory_id=null){  
            
        $category_name="الكل";       
        // $articles=Article::limit(3)->where('status','1')->orderBy('updated_at', 'desc')->get();
        if($catgory_id!=null){
         $products = Product::where(['category_id'=>$catgory_id,'statuse'=>'1'])->get();
         $category_name=Category::find($catgory_id)->name;
        }
         else{
         $products=Product::where('statuse','1')->get();
         }
          
        return view('web.product', compact('products',/*'articles',*/'category_name'));

    } 

    public function show($id){
        $detail=Product::where('id',$id)->select('id','name','image','details')->first(); 
       return  view('web.detail',compact('detail'));
    }


}
