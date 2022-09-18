@extends('web.layouts.master-content')
@section('title')
دنيا الاسماك
@endsection

@section('css')
<link rel="stylesheet" href="{{asset('web/asset/product.css')}}">
@endsection
@section('categorys')
<li class="nav-item dropdown">
  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
    الاقسام
  </a>
  <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
    <li><a class="dropdown-item" href="{{route('product')}}">الكل</a></li>  
       @isset($catgorys)
       @foreach ($catgorys as $category )
          <li><a class="dropdown-item" href="{{route('product',$category->id)}}">{{$category->name}}</a></li>     
       @endforeach
      
      @endisset

  </ul>
</li>

@endsection
@section('search')
<form class="d-flex">
    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
    <button class="btn btn-outline-success" type="submit">Search</button>
  </form>
@endsection


@section('content')




<div class="container p-0 mt-5 mb-5">
    <div class="row row-cols-1 row-cols-lg-4 row-cols-md-2 g-4">
      @isset($products)
      @foreach ($products as $product)
      <div class="col">
        <div class="card">
          <i class="bi bi-heart-fill"></i>
          <img src="{{$product->image_path}}" class="card-img-top" alt="...">
          <div class="card-body text-center">
            <h5 class="card-title">{{$product->name}}</h5>
            <h4 class="card-text text-danger"> سعر الكيلوا{{$product->price}} ريال</h4>
            <h4 class="card-text text-danger"> {{$product->details}} </h4>
            {{-- <button type="button" class="btn btn-outline-primary">Add to cart</button> --}}
          </div>
        </div>
      </div>
      @endforeach
        
      @endisset
      <div class="float" id="scroller">
        <svg xmlns="http://www.w3.org/2000/svg"  fill="currentColor" class="bi bi-arrow-up my-float" viewBox="0 0 16 16">
          <path fill-rule="evenodd" d="M8 15a.5.5 0 0 0 .5-.5V2.707l3.146 3.147a.5.5 0 0 0 .708-.708l-4-4a.5.5 0 0 0-.708 0l-4 4a.5.5 0 1 0 .708.708L7.5 2.707V14.5a.5.5 0 0 0 .5.5z"/>
        </svg>
      </div>
     
    </div>
  </div>





{{-- <section style="background-color: #eee;">
    <div class="container py-5">
      <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6 col-xl-4">
          <div class="card" style="border-radius: 15px;">
            <div class="bg-image hover-overlay ripple ripple-surface ripple-surface-light"
              data-mdb-ripple-color="light">
              <img src="https://mdbcdn.b-cdn.net/img/Photos/Horizontal/E-commerce/Products/12.webp"
                style="border-top-left-radius: 15px; border-top-right-radius: 15px;" class="img-fluid"
                alt="Laptop" />
              <a href="#!">
                <div class="mask"></div>
              </a>
            </div>
            <div class="card-body pb-0">
              <div class="d-flex justify-content-between">
                <div>
                  <p><a href="#!" class="text-dark">Dell Xtreme 270</a></p>
                  <p class="small text-muted">Laptops</p>
                </div>
                <div>
                  <div class="d-flex flex-row justify-content-end mt-1 mb-4 text-danger">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                  </div>
                  <p class="small text-muted">Rated 4.0/5</p>
                </div>
              </div>
            </div>
            <hr class="my-0" />
            <div class="card-body pb-0">
              <div class="d-flex justify-content-between">
                <p><a href="#!" class="text-dark">$3,999</a></p>
                <p class="text-dark">#### 8787</p>
              </div>
              <p class="small text-muted">VISA Platinum</p>
            </div>
            <hr class="my-0" />
            <div class="card-body">
              <div class="d-flex justify-content-between align-items-center pb-2 mb-1">
                <a href="#!" class="text-dark fw-bold">Cancel</a>
                <button type="button" class="btn btn-primary">Buy now</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section> --}}
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