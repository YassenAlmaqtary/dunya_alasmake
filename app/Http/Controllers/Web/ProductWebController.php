<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductWebController extends Controller
{
    

    public function getProduct($catgory_id=null){
               
        $catgorys = Category::selection()->get();
        if($catgory_id!=null)
         $products = Product::where(['category_id'=>$catgory_id,'statuse'=>'1'])->get();
         else
         $products=Product::where('statuse','1')->get();
          
        return view('web.product', compact('products','catgorys'));

    } 



}
