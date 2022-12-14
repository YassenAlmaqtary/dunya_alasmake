@php
  $name=@isset($product)?$product->name:old('name');
  $imag=@isset($product)?$product->image_path:asset('asset/dashboard/uploads/placeholder1.png');
  $price=@isset($product)?$product->price:old('price');  
  $details=@isset($product)?$product->details:old('details');
  $main_catgory_id=@isset($product)?$product->category_id:old('categry_id');
    
@endphp

<form 
action="
@if ($flags==true)
{{route('admin.product.update',$product->id)}}
@else
{{route('admin.product.store')}}
@endif" 
method="post" novalidate enctype="multipart/form-data">
@if ($flags==true)
<input name="id" value="{{$product->id}}" type="hidden">
@method('put')
@endif
    @csrf
    <div class="card-body">
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label for="inputStatus">اختر القسم</label>
            <select id="inputStatus" name="category_id" class="form-control custom-select">
              <option selected="" disabled="">اختر</option>
              @foreach ($catgorys as $category )
              <option {{ $main_catgory_id == $category->id ? "selected" : "" }} value="{{$category->id}}">{{$category->name}}</option>
              @endforeach
            </select>
          </div>
          @error('category_id')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>
      </div>
         
      <div class=row>
        <div class ="col-md-6">
          <div class="form-group">
            <label for="exampleInputEmail1">اسم المنتج</label>
            <input type="text" name="name" value="{{$name}}" class="form-control" id="exampleInputEmail1" placeholder="اسم المنتج">
          </div>
          @error('name')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>

        <div class ="col-md-6">
          <div class="form-group">
            <label for="exampleInputEmail1">سعر- 1كجم  </label>
            <input type="number" name="price" value="{{$price}}" class="form-control" id="exampleInputEmail1" placeholder="سعر- 1كجم ">
          </div>
          @error('price')
          <span class="text-danger">{{$message}}</span>
           @enderror
        </div>
      </div>
         
      <div class="row">
        <div class="col-md-12">
          <div class="form-group">
            <label for="inputDescription">تفاصيل المنتج</label>
            <textarea id="inputDescription" name="details" class="form-control" rows="4">{{$details}}</textarea>
          </div>
          @error('details')
          <span class="text-danger">{{$message}}</span>
           @enderror
        </div>
      </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="exampleInputFile">تحميل الصورة</label>
              <div class="input-group">
                <div class="custom-file">
                  <input type="file" name="image" class="custom-file-input" id="exampleInputFile">
                  <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                </div>
                <div class="input-group-append">
                  <span class="input-group-text">Upload</span>
                </div>
              </div>
            </div>
            @error('image')
            <span class="text-danger">{{$message}}</span>
            @enderror
          </div>   
      </div>
        
    

      <div class="row">
        <div class="col-md-12">
          <!-- /.card-body -->
          <div class="card-footer">
            <button type="submit" class="btn btn-primary">@if ($flags==true)
              تعديل
              @else
              اضافة
            @endif
          </button>
          </div>  
        </div>
      </div>
    </div>   
</form>
<div class="card-body">
<div class="row">
  <div class="col-md-6">
    <img style="width: 350px; height: 350px;" src="{{$imag}}" class="rounded" id="outImage" alt="">
  </div>
 
</div>
</div>



