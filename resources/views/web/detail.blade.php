@extends('web.layouts.master-content')
@section('title')
دنيا الاسماك
@endsection

@section('css')
  <link rel="stylesheet" href="{{asset('web/asset/product.css')}}">
@endsection


@section('content')

<div class="blue_bg">
    <div class="container">
       <div class="row">
          <div class="col-md-12">
             <div class="titlepage">
                <h2>تفاصيل المنتج</h2>
             </div>
          </div>
       </div>
    </div>
 </div>
 <!-- about section -->
 <div class="about">
    <div class="container">
       <div class="row">
          <div class="col-md-5">
             <div class="about_text">
                <h3>{{$product->name}}</h3>
                <p>{{$product->details!=null?$product->details:'لايوجد حاليا تفاصيل لهذا المنتج'}} </p>
                {{-- <a class="read_more" href="#">Read More</a> --}}
             </div>
          </div>
          <div class="col-md-7">
             <div class="about_img">
                <figure >
                  <img style="width:90%" src="{{$product->image_path}}" alt="#"/>
                </figure>
             </div>
          </div>
       </div>
    </div>
 </div>
 <!-- end about section -->

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