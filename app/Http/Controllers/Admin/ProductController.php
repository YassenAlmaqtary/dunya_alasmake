<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Product;
use App\Traits\GeneralTrait;
use Carbon\Carbon;
use Exception;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    use GeneralTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::get();
    
        
        return view('admin.product.index', compact('products'));
    }

    /**
     * Show the for
     * m for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $flags = false;
        $catgorys = Category::selection()->get();
        return view('admin.product.create', compact('catgorys', 'flags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        try {  
            // $object = json_decode(json_encode($_REQUEST));
            // return $object->name;
            $product_name_exsite = Product::select('id', 'name')->where('name', $request->name)->count();
            if ($product_name_exsite > 0) {
                return  redirect()->route('admin.product')->with(['error' => 'الاسم موجود من قبل']);
            }
            $filePath = null;
            if ($request->has('image')) {
                $filePath = uploadImage('products', $request->image);
            }
            $details = null;
            if ($request->has('details')) {
                $details = $request->details;
            }
            $discount_price = null;
            if ($request->has('discount_price')) {
                $discount_price = $request->discount_price;
            }


            DB::beginTransaction();
            Product::insert(
                [
                    'name' => $request->name,
                    'image' => $filePath,
                    'price' => $request->price,
                    'category_id' => $request->category_id,
                    'details' => $details,
                    'discount_price' => $discount_price,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),

                ]
            );
            DB::commit();
            return  redirect()->route('admin.product')->with(['success' => 'تم الحفظ بنجاح']);
        } catch (Exception $exp) {
            DB::rollBack();
            removeImage('/dashboard/uploads/products/' . $filePath);
            return  redirect()->route('admin.product')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
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
            $product = Product::find($id);
            if (!$product)
                return redirect()->route('admin.product')->with(['error' => ' هذا المنتج غير موجود او تم حذفة من قبل']);
            $catgorys = Category::selection()->get();
            return view('admin.product.create', compact('product', 'catgorys', 'flags'));
        } catch (Exception $exp) {

            return  redirect()->route('admin.product')->with(['error' => 'حدث خطا ما يرجاء المحاوله لاحقا']);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, $id)
    {
        try {
            $product = Product::find($id);
            if (!$product){
                return redirect()->route('admin.product')->with(['error' => ' هذا المنتج غير موجود اوتم حذفة من قبل']);
            }
            $product_name_exsite = Product::select('id', 'name')->where('name', $request->name)->first();
        
            if ($product_name_exsite!=null and $product_name_exsite->id!=$id) {
                return  redirect()->route('admin.product')->with(['error' => 'الاسم موجود من قبل']);
            }    

            $filePath = $product->image;
            $details = $product->details;
            $discount_price = $product->discount_price;
            if ($request->has('image')) {
                removeImage('/dashboard/uploads/products/' . $filePath);
                $filePath = uploadImage('products', $request->image);
            }

            if ($request->has('details')) {
                $details = $request->details;
            }

            if ($request->has('discount_price')) {
                $discount_price = $request->discount_price;
            }
            DB::beginTransaction();
            Product::where('id', $id)->update(
                [
                    'name' => $request->name,
                    'image' => $filePath,
                    'price' => $request->price,
                    'category_id' => $request->category_id,
                    'details' => $details,
                    'discount_price' => $discount_price,
                    'updated_at' => Carbon::now(),
                ]
            );
            DB::commit();
            return  redirect()->route('admin.product')->with(['success' => 'تم التحديث بنجاح']);
        } catch (Exception $exp) {
            DB::rollBack();
            removeImage('/dashboard/uploads/products/' . $filePath);
            return  redirect()->route('admin.product')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
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
            $product =Product::find($id);
            if (!$product)
               $this->returnError(404,' هذا المنتج غير موجود اوتم حذفة من قبل');
            $filePath = $product->image;
            if ($filePath != null) {
                removeImage('/dashboard/uploads/products/' . $filePath);
            }
            $product->delete();
            return $this->returnData ('success','200','تم الحذف بنجاح');
        } catch (Exception $exp) {
            $this->returnError(500,'حدث خطا ما برجاء المحاوله لاحقا');
          
        }
    }

public function changeStause(Request $request)  {
   
    try{
         // $json = file_get_contents("php://input"); // json string
        // $object = json_decode($json);
        // return $object->statu;
        Product::where('id', $request->product_id)->update(
            [
               'statuse' =>$request->statu,
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
