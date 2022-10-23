@php
  $name=@isset($category)?$category->name:old('name');
  $imag=@isset($category)?$category->icon_path:asset('asset/dashboard/uploads/placeholder1.png');
      
@endphp

<form 
action="
@if ($flags==true)
{{route('admin.categorys.update',$category->id)}}
@else
{{route('admin.categorys.store')}}
@endif" 
method="post" novalidate enctype="multipart/form-data">
@if ($flags==true)
<input name="id" value="{{$category->id}}" type="hidden">
@method('put')
@endif
    @csrf
    <div class="card-body">
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label for="exampleInputEmail1">اسم القسم</label>
            <input type="text" name="name" value="{{$name}}" class="form-control" id="exampleInputEmail1" placeholder="ادخل اسم القسم">
          </div>
          @error('name')
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
                <input type="file" name="icon" class="custom-file-input" id="exampleInputFile">
                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
              </div>
              <div class="input-group-append">
                <span class="input-group-text">Upload</span>
              </div>
            </div>
          </div>
          @error('icon')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>
      </div>
          
      <div class="row">
        <div class="col-md-6">
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
</form>
</div>
<div class="card-body">
  <div class="row">
    <div class="col-md-6">
      <img style="width: 350px; height: 350px;" src="{{$imag}}" class="rounded" id="outImage" alt="">
    </div>
  </div>
</div>






