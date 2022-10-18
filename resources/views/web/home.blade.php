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


@section('slider')

<div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
      </div>
   <div class="carousel-inner">
     <div class="carousel-item active">
      <img  src="{{asset('web/asset/images/logo.jpg')}}" class="d-block w-100" alt="...">
     </div>
     <div class="carousel-item">
       <img src="{{asset('web/asset/images/fashion.jpg')}}" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
        <img src="{{asset('web/asset/images/fashion2.jpg')}}" class="d-block w-100" alt="...">
      </div>  
       <div class="carousel-item">
        <img src="{{asset('web/asset/images/fashion3.jpg')}}" class="d-block w-100" alt="...">
       </div>        
   </div>
 </div>


 {{-- <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="{{asset('web/asset/images/logo.jpg')}}" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
        <img src="{{asset('web/asset/images/fashion.jpg')}}" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
        <img src="{{asset('web/asset/images/fashion2.jpg')}}" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
        <img src="{{asset('web/asset/images/fashion3.jpg')}}" class="d-block w-100" alt="...">
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div> --}}
@endsection


@section('content')





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