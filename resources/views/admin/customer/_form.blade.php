@php
  $name=@isset($customer)?$customer->name:old('name');
  $email=@isset($customer)?$customer->email:old('email');
  $address=@isset($customer)?$customer->address:old('address');
  $phone=@isset($customer)?$customer->phone:old('phone');
  $imag=@isset($customer)?$customer->image_path:asset('asset/dashboard/uploads/placeholder1.png');
  $gender=@isset($customer)?$customer->gender:old('gender');
  @endisset  
@endphp
<form 
action="
@if ($flags==true)
{{route('admin.customer.update',$customer->id)}}
@else
{{route('admin.customer.store')}}
@endif" 
method="post" novalidate enctype="multipart/form-data">
@if ($flags==true)
<input name="id" value="{{$customer->id}}" type="hidden">
@method('put')
@endif
    @csrf
    <div class="card-body">
      
         
      <div class=row>
        <div class ="col-md-6">
          <div class="form-group">
            <label for="exampleInputEmail1">الاسم </label>
            <input type="text" name="name" value="{{$name}}" class="form-control" id="exampleInputEmail1" placeholder="اسم العميل">
          </div>
          @error('name')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>

        <div class ="col-md-6">
          <div class="form-group">
            <label for="exampleInputEmail1">الايميل </label>
            <input type="email" name="email" value="{{$email}}" class="form-control" id="exampleInputEmail1" placeholder="الايميل">
          </div>
          @error('email')
          <span class="text-danger">{{$message}}</span>
           @enderror
        </div>
      </div>


         
      <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="inputDescription"> العنوان</label>
              <input type="text" name="address" value="{{$address}}" class="form-control" id="exampleInputEmail1" placeholder="العنوان">
            </div>
            @error('address')
            <span class="text-danger">{{$message}}</span>
            @enderror
          </div>

         <div class="col-md-6">
          <div class="form-group">
            <label for="inputDescription"> الهاتف</label>
            <input type="text" name="phone" value="{{$phone}}" class="form-control" id="exampleInputEmail1" placeholder="الهاتف">
          </div>
          @error('phone')
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

          <div class="col-md-6">
            <div class="form-group">
                <label>الجنس</label>
                <div class="row">
                    <div class="col-md-3">
                        <input @isset($gender)
                        @if ($gender==1)
                          checked
                        @endif
                        @endisset name="gender" type="radio" 
                               id="radio_14" class="radio-col-blue" value="1"/>
                        <label for="radio_14">ذكر</label>
                    </div>
                    <div class="col-md-3">
                        <input @isset($gender)
                        @if ($gender==0)
                          checked
                        @endif
                        @endisset name="gender"  type="radio"
                               id="radio_15" class="radio-col-blue" value="0"/>
                        <label for="radio_15">انثى</label>
                    </div>

                </div>
            </div>
            @error('gender')
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