<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ArticeRequset;
use App\Models\Article;
use App\Traits\GeneralTrait;
use App\Traits\HelperTrait;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ArticleController extends Controller
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
        $articles=Article::get();
        return view('admin.article.index',compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $flags = false;
        return view('admin.article.create', compact( 'flags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArticeRequset $request)
    {
        try{
        
             $filePath = null;
            if ($request->has('image')) {
                $filePath =  $this->uploadImage('articles', $request->image);
            }
           
             DB::beginTransaction();
             Article::insert(
                [
                 'id'=>$request->id,
                 'title'=>$request->title,
                 'article_details'=>$request->article_details,
                 'image'=>$filePath,
                 'created_at' => Carbon::now(),
                 'updated_at' => Carbon::now(),
                    
                ]
             );
             db::commit();
            return redirect()->route('admin.article')->with(['success' => 'تم الحفظ بنجاح']);
    
           }
           catch(Exception $exp){  
             DB::rollBack();
              return  redirect()->route('admin.article')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
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
        try {
            $flags = true;
            $article = Article::find($id);
            if (!$article)
            return redirect()->route('admin.product')->with(['error' => ' هذا المقالة غير موجود او تم حذفة من قبل']);
    
            return view('admin.article.create', compact('article', 'flags'));
        } catch (Exception $exp) {

            return  redirect()->route('admin.article')->with(['error' => 'حدث خطا ما يرجاء المحاوله لاحقا']);
        }
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
        try {
            $article = Article::find($id);
            if (!$article){
                return redirect()->route('admin.article')->with(['error' => ' هذا المقالة غير موجود اوتم حذفة من قبل']);
            } 
    
            $filePath = $article->image;
            if ($request->has('image')) {
                if( $filePath!=null){
                    $this->removeImage('/dashboard/uploads/articles/' . $filePath);
                $filePath =  $this->uploadImage('articles', $request->image);
                }
                else{
                    $filePath =  $this->uploadImage('articles', $request->image); 
                }
            }

            DB::beginTransaction();
            Article::where('id', $id)->update(
                [
                    'title'=>$request->title,
                    'article_details'=>$request->article_details,
                    'image'=>$filePath,
                    'updated_at' => Carbon::now(),
                       
                ]
            );
            DB::commit();
            return  redirect()->route('admin.article')->with(['success' => 'تم التحديث بنجاح']);
        } catch (Exception $exp) {
            DB::rollBack();
            $this->removeImage('/dashboard/uploads/articles/'. $filePath);
            return  redirect()->route('admin.article')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
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
            $article =Article::find($id);
            if (!$article)
               $this->returnError(404,' هذا المقالة غير موجود اوتم حذفة من قبل');
            $filePath = $article->image;
            if ($filePath != null) {
                $this-> removeImage('/dashboard/uploads/articles/' . $filePath);
            }
            $article->delete();
            return $this->returnData ('success','200','تم الحذف بنجاح');
        } catch (Exception $exp) {
            $this->returnError(500,'حدث خطا ما برجاء المحاوله لاحقا');
          
        }
        
    }

    public function changeStause(Request $request)  {
   
        try{

            Article::where('id', $request->article_id)->update(
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
