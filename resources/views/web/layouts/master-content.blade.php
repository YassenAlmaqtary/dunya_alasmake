<!DOCTYPE html>
<html lang="en">
 @include('web.layouts.head')
   <!-- body -->
   <body class="main-layout">
      <!-- loader  -->
      <div class="loader_bg">
         <div class="loader"><img src="{{asset('web/asset/images/loading.gif')}}" alt="#" /></div>
      </div>
      <!-- end loader -->
       @include('web.layouts.header')    
      {{-- <!-- banner -->
      <section class="banner_main">
         <div class="container">
            <div class="row">
               <div class="col-md-8">
                  <div class="text-bg">
                     <h1> <span class="blodark">دنيا الاسماك</span> <br>تسوق <?php echo date("Y"); ?></h1>
                     <p>لااجود انواع الاسماك والمؤكلات البحرية</p>
                     {{-- <a class="read_more" href="#">Shop now</a> --}}
                  {{-- </div>
               </div>
               <div class="col-md-4">
                  <div class="ban_img">
                     <figure><img style="width:80%;height:80%;" src="{{asset('web/asset/images/logo.jpg')}}" alt="#"/></figure>
                  </div>
               </div>
            </div>
         </div>
      </section> --}}
      <!-- end banner --> 

      
      <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
         <div class="carousel-inner">
           <div class="carousel-item active">
            <img  src="{{asset('web/asset/images/fashion.jpg')}}" class="d-block w-100" alt="...">
           </div>
           <div class="carousel-item">
             <img src="{{asset('web/asset/images/logo.jpg')}}" class="d-block w-100" alt="...">
           </div>
          
         </div>
       </div>

      
      {{-- <!-- six_box section -->
      <div class="six_box">
         <div class="container-fluid">
            <div class="row">
               <div class="col-md-2 col-sm-4 pa_left">
                  <div class="six_probpx yellow_bg">
                     <i><img src="{{asset('web/asset/images/shoes.png')}}" alt="#"/></i>
                     <span>Shoes</span>
                  </div>
               </div>
               <div class="col-md-2 col-sm-4 pa_left">
                  <div class="six_probpx bluedark_bg">
                     <i><img src="{{asset('web/asset/images/underwear.png')}}" alt="#"/></i>
                     <span>underwear</span>
                  </div>
               </div>
               <div class="col-md-2 col-sm-4 pa_left">
                  <div class="six_probpx yellow_bg">
                     <i><img src="{{asset('web/asset/images/pent.png')}}" alt="#"/></i>
                     <span>Pante & socks</span>
                  </div>
               </div>
               <div class="col-md-2 col-sm-4 pa_left">
                  <div class="six_probpx bluedark_bg">
                     <i><img src="{{asset('web/asset/images/t_shart.png')}}" alt="#"/></i>
                     <span>T-shirt & tankstop</span>
                  </div>
               </div>
               <div class="col-md-2 col-sm-4 pa_left">
                  <div class="six_probpx yellow_bg">
                     <i><img src="{{asset('web/asset/images/jakit.png')}}" alt="#"/></i>
                     <span>cardigans & jumpers</span>
                  </div>
               </div>
               <div class="col-md-2 col-sm-4 pa_left">
                  <div class="six_probpx bluedark_bg">
                     <i><img src="{{asset('web/asset/images/helbet.png')}}" alt="#"/></i>
                     <span>Top & hat</span>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- end six_box section --> --}}

        @yield('content')
     
      {{-- <!-- three_box section -->
      <div class="three_box project">
         <div class="container">
            <div class="row">
               <div class="col-md-4">
                  <div class="gift_box">
                     <i><img src="{{asset('web/asset/images/icon_mony.png')}}"></i>
                     <span>Money Back</span>
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="gift_box">
                     <i><img src="{{asset('web/asset/images/icon_gift.png')}}"></i>
                     <span>Special Gift</span>
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="gift_box">
                     <i><img src="{{asset('web/asset/images/icon_car.png')}}"></i>
                     <span>Free Shipping</span>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- end three_box section --> --}}
      @include('web.layouts.footer')
      
      @include('web.layouts.script')
   </body>
</html>





