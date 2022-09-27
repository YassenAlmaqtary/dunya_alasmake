@php

  $title=@isset($article)?$article->title:old('title');
  $imag=@isset($article)?$article->image_path:asset('dashboard/uploads/placeholder1.png');
  $article_details=@isset($article)?$article->article_details:old('article_details');  
  @endisset  
@endphp

<form 
action="
@if ($flags==true)
{{route('admin.article.update',$article->id)}}
@else
{{route('admin.article.store')}}
@endif" 
method="post" novalidate enctype="multipart/form-data">
@if ($flags==true)
<input name="id" value="{{$article->id}}" type="hidden">
@method('put')
@endif
    @csrf
    <div class="card-body">
     
         
      <div class=row>
        <div class ="col-md-6">
          <div class="form-group">
            <label for="exampleInputEmail1">عنوان المقالة</label>
            <input type="text" name="title" value="{{$title}}" class="form-control" id="exampleInputEmail1" placeholder="عنوان  المقالة">
          </div>
          @error('title')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>
      </div>
         
      <div class="row">
        <div class="col-md-12">
          <div class="form-group">
            <label for="inputDescription">تفاصيل المقالة</label>
            <textarea id="inputDescription" name="article_details" class="form-control" rows="4">{{$article_details}}</textarea>
          </div>
          @error('article_details')
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



