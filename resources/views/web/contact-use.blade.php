@extends('web.layouts.master-content')
@section('title')
دنيا الاسماك البليلي تواصل معنا
@endsection
@section('css')
  <link rel="stylesheet" href="{{asset('asset/web/asset/product.css')}}">
 
@endsection


{{-- @section('search')
 <div class="search">
  <form action="#">
     <input class="form_sea" type="text" placeholder="Search" name="search">
     <button type="submit" class="seach_icon"><i class="fa fa-search"></i></button>
  </form>
</div>
@endsection --}}


@section('content')
  <div class="project">
   
<!-- banner -->
<div class="blue_bg">
   <div class="container">
      <div class="row">
         <div class="col-md-12">
            <div class="titlepage">
               <h2>تواصل معنا</h2>
            </div>
         </div>
      </div>
   </div>
</div>
<!-- contact section -->
@include('admin.alerts.success')
@include('admin.alerts.errors') 

<div id="contact" class="contact" style="margin:4%">
   <div class="con_bg project">
      <div class="container">
         <div class="row ">
            <div class="col-md-10 offset-md-1">
               <form id="request" class="main_form" action="{{route('contact-us.store')}}" method="POST">
                  @csrf
                  <div class="row">
                     <div class="col-md-6 col-sm-6">
                        <input class="contactus" placeholder="الاسم" type="text" name="name">
                        @error('name')
                         <span class="text-danger">{{$message}}</span>
                        @enderror 
                     </div>
                     <div class="col-md-6 col-sm-6">
                        <input class="contactus" placeholder="رقم الهاتف" type="text" name="phone"> 
                        @error('phone')
                        <span class="text-danger">{{$message}}</span>
                       @enderror 
                     </div>
                     <div class="col-md-6 col-sm-6">
                        <input class="contactus" placeholder="الايميل" type="email" name="email">
                        @error('email')
                        <span class="text-danger">{{$message}}</span>
                       @enderror                           
                     </div>
                     <div class="col-md-6 col-sm-6">
                        <input class="contactus" placeholder="العنوان" type="text" name="address"> 
                        @error('address')
                        <span class="text-danger">{{$message}}</span>
                       @enderror                          
                     </div>
                     <div class="col-md-12">
                        <input class="contactusmess" placeholder="الرسالة" type="text" Message="message" name="message">
                        @error('message')
                        <span class="text-danger">{{$message}}</span>
                       @enderror 
                     </div>
                     <div class="col-md-12">
                        <button class="send_btn">Send</button>
                     </div>
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>
</div>
<!-- end contact section -->

  </div>

  <div class="float" id="scroller">
   <svg xmlns="http://www.w3.org/2000/svg"  fill="currentColor" class="bi bi-arrow-up my-float" viewBox="0 0 16 16">
     <path fill-rule="evenodd" d="M8 15a.5.5 0 0 0 .5-.5V2.707l3.146 3.147a.5.5 0 0 0 .708-.708l-4-4a.5.5 0 0 0-.708 0l-4 4a.5.5 0 1 0 .708.708L7.5 2.707V14.5a.5.5 0 0 0 .5.5z"/>
   </svg>
 </div>

</div>
</div>

@endsection

@section('script')
<script>
let scroller=document.getElementById('scroller');
document.addEventListener('scroll', (e) => {
  
  if(window.scrollY>0){
  
   scroller.style.display="block";
}
else{
  scroller.style.display="none";
}
});

scroller.addEventListener("click", _=>{ 
  window.scroll({
  top: 0,
  left:0,
  behavior: 'smooth'
});
});
</script>



@endsection