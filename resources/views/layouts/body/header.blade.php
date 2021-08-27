

<!-- ======= Header ======= -->
<header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

      <h1 class="logo mr-auto"><a href="{{url('/')}}"><span>Aman</span>Khalsa</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo mr-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav class="nav-menu d-none d-lg-block">
        <ul>
          <li class="active"><a href="{{url('/')}}">Home</a></li>

          <li class="drop-down"><a href="#">About</a>
            <ul>
              <li><a href="{{route('about_us')}}">About Us</a></li>
              <li><a href="{{route('our_team')}}">Team</a></li>
              <li><a href="{{route('Testimonials')}}">Testimonials</a></li>

              <li class="drop-down"><a href="#">Deep Drop Down</a>
                <ul>
                  <li><a href="#">Deep Drop Down 1</a></li>
                  <li><a href="#">Deep Drop Down 2</a></li>
                  <li><a href="#">Deep Drop Down 3</a></li>
                  <li><a href="#">Deep Drop Down 4</a></li>
                  <li><a href="#">Deep Drop Down 5</a></li>
                </ul>
              </li>
            </ul>
          </li>

          <li><a href="{{route('Services')}}">Services</a></li>
          <li><a href="{{route('Portfolio')}}">Portfolio</a></li>
          <li><a href="{{route('Pricing')}}">Pricing</a></li>
          <li><a href="{{route('Blog')}}">Blog</a></li>
          <li><a href="{{route('Contact')}}">Contact</a></li>
          <li><a href="{{route('login')}}">Login</a></li>


        </ul>
      </nav><!-- .nav-menu -->

      <div class="header-social-links">
        <a href="https://twitter.com/amansin31gmail2" class="twitter"><i class="icofont-twitter"></i></a>
        <a href="https://www.facebook.com/amansingh.co/" class="facebook"><i class="icofont-facebook"></i></a>
        <a href="https://www.instagram.com/khalsa_veeer/" class="instagram"><i class="icofont-instagram"></i></a>
        <a href="https://www.youtube.com/channel/UCxbsAh7NLciLLgKohVgJPQg" class="linkedin"><i class="icofont-youtube"></i></i></a>
      </div>

    </div>
  </header><!-- End Header -->