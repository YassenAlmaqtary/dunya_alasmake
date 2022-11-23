@extends('web.layouts.master-content')
@section('title')
دنيا الاسماك البليلي منتجاتنا عالم متميز من الماكولات البحرية
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
@section('slider')
 
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="{{asset('asset/web/asset/images/logo.jpg')}}" alt="First slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="{{asset('asset/web/asset/images/fashion.jpg')}}" alt="Second slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="{{asset('asset/web/asset/images/fashion2.jpg')}}" alt="Third slide">
    </div>
  </div>
  <div class="carousel-item">
    <img class="d-block w-100" src="{{asset('asset/web/asset/images/fashion3.png')}}" alt="Third slide">
  </div>
</div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>


@endsection

@section('content')

<!-- project section -->
<div id="project" style="margin-top: 2%;">
  <div class="container">

    <div class="titlepage">
      @isset($category_name)
      <h2>{{$category_name}}</h2>
      @endisset
  </div>

    <div class="product_main">
       
      @isset($products)
     @foreach ($products as $product)

      <div class="cardu">
        <img  src="{{$product->image_path}}" alt="Card image cap">
        <div >
          <h1 >{{$product->name}}</h1>
          <p ><span>سعر الكيلو</span>{{$product->price}}&nbsp;<span>ريال</span></p>
          <a href="{{route('detail_product',$product->id)}}" class="btn btn-primary">تفاصيل</a>
          <p onclick="location.href='tel:+967772003973'" class="btn btn-primary">الهاتف</p>
        </div>
      </div>
   
       @endforeach
       @endisset
      
    </div>
     
    </div>
  </div>
</div>
<!-- end project section -->



 <!-- news section -->
      
 <!--<div class="news project">
  <div class="container">
     <div class="row">
        <div class="col-md-12">
           <div class="titlepage">
              <h2>اخر المقالات</h2>
           </div>
        </div>
     </div>
     <div class="row">
        {{-- @foreach ($articles as $article) --}}
        <div class="col-md-12 margin_top40">
         <div class="row d_flex">
            <div class="col-md-5">
               <div class="news_img">
                  {{-- <figure><img style="width: 70%;height:70%;" src="{{$article->image_path}}"></figure> --}}
               </div>
            </div>
            <div class="col-md-7">
               <div class="news_text">
                  {{-- <h3>{{$article->title}}</h3> --}}
                  {{-- <span>{{$article->updated_at}}</span>  --}}
                  {{-- <div class="date_like">
                     <span>Like </span><span class="pad_le">Comment</span>
                  </div> --}}
                  {{-- <p>{{$article->article_details}}</p> --}}
               </div>
            </div>
         </div>
      </div>
        {{-- @endforeach --}}
       
       
     </div>
  </div>
</div>-->
<!-- end news section -->
<!-- newslatter section -->
{{-- <div  class="newslatter project">
  <div class="container">
     <div class="row d_flex">
        <div class="col-md-5">
           <h3 class="neslatter">Subscribe To The Newsletter</h3>
        </div>
        <div class="col-md-7">
           <form class="news_form">
              <input class="letter_form" placeholder=" Enter your email" type="text" name="Enter your email">
              <button class="sumbit">Subscribe</button>
           </form>
        </div>
     </div>
  </div>
</div> --}}
<!-- end newslatter section -->


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