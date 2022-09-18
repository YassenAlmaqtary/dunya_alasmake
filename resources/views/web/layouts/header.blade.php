<nav class="navbar navbar-expand-lg navbar-light header">
    <div class="container-fluid cn">
      <a class="navbar-brand" href="#">دنيا الاسماك</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">الرئيسية</a>
          </li>
          
          @yield('categorys')
        </ul>
         @yield('search')
      </div>
    </div>
  </nav>
  