  <!-- header -->
  <header>
    <!-- header inner -->
    <div class="header">
       <div class="header_top">
          <div class="container">
             <div class="row">
                <div class="col-md-4">
                   <ul class="conta_icon">
                      <li><a href="#"><img src="{{asset('web/asset/images/call.png')}}" alt="#"/>Call us:+967772003973</a> </li>
                   </ul>
                </div>
                <div class="col-md-4">
                   <ul class="social_icon">
                      <li> <a href="https://www.facebook.com/profile.php?id=100054553655426"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                      <li> <a href="#"><i class="fa fa-twitter"></i></a></li>
                      <li> <a href="#"> <i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                      <li> <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i>
                         </a>
                      </li>
                   </ul>
                </div>
                <div class="col-md-4">
                   <div class="se_fonr1">
                      {{-- <form action="#" >
                         <div class="select-box">
                            <label for="select-box1" class="label select-box1"><span class="label-desc">English</span> </label>
                            <select id="select-box1" class="select">
                               <option value="Choice 1">English</option>
                               <option value="Choice 1">Falkla</option>
                               <option value="Choice 2">Germa</option>
                               <option value="Choice 3">Neverl</option>
                            </select>
                         </div>
                      </form> --}}
                      <span class="time_o"> Open hour: 8.00 - 2.00</span>
                   </div>
                </div>
             </div>
          </div>
       </div>
       <div class="header_midil ">
          <div class="container">
             <div class="row d_flex">
                <div class="col-md-4">
                   <ul class="conta_icon d_none1">
                      <li><a href="#"><img src="{{asset('web/asset/images/email.png')}}" alt="#"/> demo@gmail.com</a> </li>
                   </ul>
                </div>
                <div class="col-md-4">
                   <a class="logo" href="#"><img src="{{asset('web/asset/images/logo.jpg')}}" alt="#"/></a>
                </div>
                <div class="col-md-4">
                   {{-- <ul class="right_icon d_none1">
                      <li><a href="#"><img src="{{asset('web/asset/images/shopping.png')}}" alt="#"/></a> </li>
                      <a href="#" class="order">Order Now</a> 
                   </ul> --}}
                </div>
             </div>
          </div>
       </div>
       <div class="header_bottom">
          <div class="container">
             <div class="row">
                <div class="col-xl-8 col-lg-8 col-md-8 col-sm-8">
                   <nav class="navigation navbar navbar-expand-md navbar-dark ">
                      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
                      <span class="navbar-toggler-icon"></span>
                      </button>
                      <div class="collapse navbar-collapse" id="navbarsExample04">
                         <ul class="navbar-nav mr-auto">
                            <li class="nav-item active">
                               <a class="nav-link" href="{{route('product')}}">الرئيسية</a>
                            </li>
                            @yield('categorys')
                            {{-- <li class="nav-item">
                               <a class="nav-link" href="#">نبذة عنا</a>
                            </li> --}}
                            {{-- <li class="nav-item">
                               <a class="nav-link" href="#">Fashion</a>
                            </li> --}}
                            {{-- <li class="nav-item">
                               <a class="nav-link" href="#">اخبارنا</a>
                            </li> --}}
                            {{-- <li class="nav-item">
                               <a class="nav-link" href="#">Contact Us</a>
                            </li> --}}
                         </ul>
                      </div>
                   </nav>
                </div>
                <div class="col-md-4">
                  @yield('search')
                </div>
             </div>
          </div>
       </div>
    </div>
 </header>
 <!-- end header inner -->
 <!-- end header -->