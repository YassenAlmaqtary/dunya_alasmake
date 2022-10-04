@extends('web.layouts.master-content')
@section('title')
دنيا الاسماك
@endsection
@section('css')
  <link rel="stylesheet" href="{{asset('web/asset/product.css')}}">
 
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
      <div id="contact" class="contact" style="margin:4%">
         <div class="con_bg">
            <div class="container">
               <div class="row">
                  <div class="col-md-10 offset-md-1">
                     <form id="request" class="main_form" action="{{route('contact-us.store')}}" method="POST">
                        @csrf
                        <div class="row">
                           <div class="col-md-6 col-sm-6">
                              <input class="contactus" placeholder="الاسم" type="text" name="name"> 
                           </div>
                           <div class="col-md-6 col-sm-6">
                              <input class="contactus" placeholder="رقم الهاتف" type="text" name="phone"> 
                           </div>
                           <div class="col-md-6 col-sm-6">
                              <input class="contactus" placeholder="الايميل" type="email" name="email">                          
                           </div>
                           <div class="col-md-6 col-sm-6">
                              <input class="contactus" placeholder="العنوان" type="text" name="address">                          
                           </div>
                           <div class="col-md-12">
                              <input class="contactusmess" placeholder="الرسالة" type="text" Message="message" name="message">
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