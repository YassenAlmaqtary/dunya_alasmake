<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductWebController extends Controller
{
        public function getProduct($catgory_id=null){   
        $category_name="الكل";       
        $catgorys = Category::selection()->get(); 
        $articles=Article::take(3)->where('status','1')->get();
        
        if($catgory_id!=null){
         $products = Product::where(['category_id'=>$catgory_id,'statuse'=>'1'])->get();
         $category_name=Category::find($catgory_id)->name;
        }
         else{
         $products=Product::where('statuse','1')->get();
         }
          
        return view('web.product', compact('products','articles','catgorys','category_name'));

    } 

    public function show($id){
        $product=Product::where('id',$id)->select('id','name','image','details')->first(); 
       return  view('web.detail',compact('product'));
    }
    


}
