
<form action="{{route('admain.subscript.store')}}" method="post" novalidate enctype="multipart/form-data">
    @csrf
    <div class="card-body">
    <div class=row>
        <div class ="col-md-6">
          <div class="form-group">
            <label for="exampleInputEmail1">الاسم </label>
            <input type="text" name="name" value="{{$subscript->name}}" class="form-control" id="exampleInputEmail1" placeholder="اسم العميل">
          </div>
          @error('name')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>

        <div class ="col-md-6">
          <div class="form-group">
            <label for="exampleInputEmail1">الايميل </label>
            <input type="email" name="email" value="{{$subscript->email}}" class="form-control" id="exampleInputEmail1" placeholder="الايميل">
          </div>
          @error('email')
          <span class="text-danger">{{$message}}</span>
           @enderror
        </div>
    </div>
      


      <div class="row">
        <div class="col-md-12">
          <div class="form-group">
            <label for="inputDescription"> الرسالة</label>
            <textarea id="inputDescription" name="message" class="form-control" rows="4"></textarea>
          </div>
          @error('message')
          <span class="text-danger">{{$message}}</span>
           @enderror
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <!-- /.card-body -->
          <div class="card-footer">
            <button type="submit" class="btn btn-primary">
              ارسال
            
          </button>
          </div>  
        </div>
      </div>
    </div>
       
</form>

</div>