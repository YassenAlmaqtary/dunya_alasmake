@php
  $vision_details=@isset($about)?$about->vision_details:old('vision_details');
  $objectives_details=@isset($about)?$about->objectives_details:old('objectives_details');
  $Aboutus_details=@isset($about)?$about->Aboutus_details:old('Aboutus_details');
  
@endphp
<form 
action="
@if ($flags==true)
{{route('admin.apout.update',$about->id)}}
@else
{{route('admin.apout.store')}}
@endif" 
method="post" novalidate enctype="multipart/form-data">
@if ($flags==true)
<input name="id" value="{{$about->id}}" type="hidden">
@method('put')
@endif
    @csrf
    <div class="card-body">  
      <div class=row>
        <div class ="col-md-12">
          <div class="form-group">
            <label for="inputDescription">الرؤية</label>
            <textarea id="inputDescription" name="vision_details" class="form-control" rows="4">{{$vision_details}}</textarea>
          </div>
          @error('vision_details')
          <span class="text-danger">{{$message}}</span>
           @enderror
        </div>
      </div> 

      <div class=row>
        <div class ="col-md-12">
          <div class="form-group">
            <label for="inputDescription">الهدف</label>
            <textarea id="inputDescription" name="objectives_details" class="form-control" rows="4">{{$objectives_details}}</textarea>
          </div>
          @error('objectives_details')
          <span class="text-danger">{{$message}}</span>
           @enderror
        </div>
      </div> 
    
      
         
      <div class=row>
        <div class ="col-md-12">
          <div class="form-group">
            <label for="inputDescription">نبذة عنا</label>
            <textarea id="inputDescription" name="Aboutus_details" class="form-control" rows="4">{{$Aboutus_details}}</textarea>
          </div>
          @error('Aboutus_details')
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
     


 

