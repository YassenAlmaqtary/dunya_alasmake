<!--  footer -->
<footer>
  <div class="footer">
     <div class="container">
        <div class="row">
           <div class="col-sm-4">
              <div class="">
                 <h3>الاهداف</h3>
                 <p>{{App\Models\About::selection()->first()->objectives_details}}</p>
              </div>
           </div>
           <div class="col-sm-4">
              <div class="">
                 <h3>الرؤية</h3>
                 <p>{{App\Models\About::selection()->first()->vision_details}}</p>
              </div>
           </div>
           <div class="col-sm-4">
              <div class="">
                 <h3>نبذة عنا</h3>
                 <p>{{App\Models\About::selection()->first()->Aboutus_details}}</p>
              </div>
           </div>
        </div>
        <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <ul class="social_icon">
                     <li> <a href="https://www.facebook.com/Dunyaalasmak/"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                     <li> <a href="https://l.facebook.com/l.php?u=https%3A%2F%2Fapi.whatsapp.com%2Fsend%3Fphone%3D%252B967772003973%26fbclid%3DIwAR29X6OoEp5ZolSj_PiaecQYQtopdfwPLMd3asTe6CJaWWElnKUqczWU_6k&h=AT3hOJ8ReZzVayjz3_exg_NRX5woLQ5El5NQRfFuT13LO2fGB9yvvEvugLg2z8Ax63mcQdIiULkldwL9kJiMGk5fH_bxrQityPHmvIxSQ8D7teraS-JPJZWXI2QLnA3yOvDn0Q"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-whatsapp" viewBox="0 0 16 16">
                        <path d="M13.601 2.326A7.854 7.854 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.933 7.933 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.898 7.898 0 0 0 13.6 2.326zM7.994 14.521a6.573 6.573 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.557 6.557 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592zm3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.729.729 0 0 0-.529.247c-.182.198-.691.677-.691 1.654 0 .977.71 1.916.81 2.049.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232z"/>
                      </svg></a></li>
                     <li> <a href="https://www.tiktok.com/@dunyaalasmak"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-tiktok" viewBox="0 0 16 16">
                        <path d="M9 0h1.98c.144.715.54 1.617 1.235 2.512C12.895 3.389 13.797 4 15 4v2c-1.753 0-3.07-.814-4-1.829V11a5 5 0 1 1-5-5v2a3 3 0 1 0 3 3V0Z"/>
                      </svg></a></li>
                     <li> <a href="https://www.youtube.com/channel/UCMnUTX2u50lpV5aX10umytA"> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-youtube" viewBox="0 0 16 16">
                        <path d="M8.051 1.999h.089c.822.003 4.987.033 6.11.335a2.01 2.01 0 0 1 1.415 1.42c.101.38.172.883.22 1.402l.01.104.022.26.008.104c.065.914.073 1.77.074 1.957v.075c-.001.194-.01 1.108-.082 2.06l-.008.105-.009.104c-.05.572-.124 1.14-.235 1.558a2.007 2.007 0 0 1-1.415 1.42c-1.16.312-5.569.334-6.18.335h-.142c-.309 0-1.587-.006-2.927-.052l-.17-.006-.087-.004-.171-.007-.171-.007c-1.11-.049-2.167-.128-2.654-.26a2.007 2.007 0 0 1-1.415-1.419c-.111-.417-.185-.986-.235-1.558L.09 9.82l-.008-.104A31.4 31.4 0 0 1 0 7.68v-.123c.002-.215.01-.958.064-1.778l.007-.103.003-.052.008-.104.022-.26.01-.104c.048-.519.119-1.023.22-1.402a2.007 2.007 0 0 1 1.415-1.42c.487-.13 1.544-.21 2.654-.26l.17-.007.172-.006.086-.003.171-.007A99.788 99.788 0 0 1 7.858 2h.193zM6.4 5.209v4.818l4.157-2.408L6.4 5.209z"/>
                      </svg></a></li>
                     <li> <a href="https://instagram.com/dny.lsmk?igshid=YmMyMTA2M2Y="><i class="fa fa-instagram" aria-hidden="true"></i>
                        </a>
                     </li>
                     <li> <a href="https://www.google.com/maps/place/%D8%AF%D9%86%D9%8A%D8%A7+%D8%A7%D9%84%D8%A7%D8%B3%D9%85%D8%A7%D9%83+%D9%84%D9%84%D8%A7%D8%B3%D9%85%D8%A7%D9%83+%D8%A7%D9%84%D8%B7%D8%A7%D8%B2%D8%AC%D8%A9%E2%80%AD/@15.3410707,44.2102034,15z/data=!4m5!3m4!1s0x0:0xcff9aa5ee2b6c352!8m2!3d15.3410208!4d44.2101388"> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-geo-alt" viewBox="0 0 16 16">
                        <path d="M12.166 8.94c-.524 1.062-1.234 2.12-1.96 3.07A31.493 31.493 0 0 1 8 14.58a31.481 31.481 0 0 1-2.206-2.57c-.726-.95-1.436-2.008-1.96-3.07C3.304 7.867 3 6.862 3 6a5 5 0 0 1 10 0c0 .862-.305 1.867-.834 2.94zM8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10z"/>
                        <path d="M8 8a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                      </svg></a></li>
                  </ul>
               </div>
            </div>
        </div>
     </div>
     
     <div class="copyright project">
        <div class="container">
           <div class="row">
              <div class="col-md-12">
                 <p> &copy; <?php echo date("Y"); ?> : حقوق الطبع محفوظة <a href="#">دنيا الاسماك</a></p>
              </div>
           </div>
        </div>
     </div>
  </div>
</footer>
<!-- end footer -->