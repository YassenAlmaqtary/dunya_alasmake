<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ArticalWebController extends Controller
{



    public  function getArticle(){
        $articles=Article::where('status','1')->get();
        return view('web.article',compact('articles'));
    }


}
