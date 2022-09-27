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