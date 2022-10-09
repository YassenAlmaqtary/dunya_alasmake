<!--  footer -->
<footer>
  <div class="footer">
     <div class="container">
        <div class="row">
           <div class="col-md-4">
              <div class="inror_box">
                 <h3>الاهداف</h3>
                 <p>{{App\Models\About::selection()->first()->objectives_details}}</p>
              </div>
           </div>
           <div class="col-md-4">
              <div class="inror_box">
                 <h3>الرؤية</h3>
                 <p>{{App\Models\About::selection()->first()->vision_details}}</p>
              </div>
           </div>
           <div class="col-md-4">
              <div class="inror_box">
                 <h3>نبذة عنا</h3>
                 <p>{{App\Models\About::selection()->first()->Aboutus_details}}</p>
              </div>
           </div>
        </div>
        <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <ul class="social_icon">
                     <li> <a href="https://www.facebook.com/profile.php?id=100054553655426"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                     <li> <a href="#"><i class="bi bi-whatsapp"></i></a></li>
                     <li> <a href="#"><i class="fa fa-twitter"></i></a></li>
                     <li> <a href="#"> <i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                     <li> <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i>
                        </a>
                     </li>
                  </ul>
               </div>
            </div>
        </div>
     </div>
     
     <div class="copyright">
        <div class="container">
           <div class="row">
              <div class="col-md-12">
                 <p> &copy; <?php echo date("Y"); ?> : حقوق الطبع محفوظة لدى<a href="{{route('product')}}">دنيا الاسماك</a></p>
              </div>
           </div>
        </div>
     </div>
  </div>
</footer>
<!-- end footer -->