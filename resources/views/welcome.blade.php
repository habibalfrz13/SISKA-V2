<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>SISKAE - Sertfikasi & Kompetensi Keahlian</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{ asset('template/frontend/img/favicon.png') }}" rel="icon">
  <link href="{{ asset('template/frontend/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('template/frontend/vendor/aos/aos.css') }}" rel="stylesheet">
  <link href="{{ asset('template/frontend/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('template/frontend/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('template/frontend/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
  <link href="{{ asset('template/frontend/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
  <link href="{{ asset('template/frontend/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{ asset('template/frontend/css/style.css') }}" rel="stylesheet">

  <!-- =======================================================
  * Template Name: FlexStart
  * Template URL: https://bootstrapmade.com/flexstart-bootstrap-startup-template/
  * Updated: Mar 17 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

      <a href="{{ url('/') }}" class="logo d-flex align-items-center">
        <img src="{{ asset('template/frontend/img/logo.png') }}" alt="">
        <span>SISKAE</span>
      </a>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
          <li><a class="nav-link scrollto" href="#about">About</a></li>
          <li><a class="nav-link scrollto" href="#classes">Classes</a></li>
          <li><a class="getstarted scrollto" href="{{ route('login') }}">Login</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="hero d-flex align-items-center">

    <div class="container">
        <div class="row">
          <div class="col-lg-6 d-flex flex-column justify-content-center">
            <h1 data-aos="fade-up">Discover the Power of Skills Development</h1>
            <h2 data-aos="fade-up" data-aos-delay="400">Unlock Your Potential with Expert-led Classes</h2>
            <div data-aos="fade-up" data-aos-delay="600">
              <div class="text-center text-lg-start">
                <a href="#about" class="btn-get-started scrollto d-inline-flex align-items-center justify-content-center align-self-center">
                  <span>Explore Courses</span>
                  <i class="bi bi-arrow-right"></i>
                </a>
              </div>
            </div>
          </div>
          <div class="col-lg-6 hero-img" data-aos="zoom-out" data-aos-delay="200">
            <img src="{{ asset('template/frontend/img/hero-img.png') }}" class="img-fluid" alt="">
          </div>
        </div>
      </div>      

  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container">
  
        <div class="row">
          <div class="col-lg-6 order-1 order-lg-2" data-aos="fade-left">
            <img src="{{ asset('template/frontend/img/about.jpg') }}" class="img-fluid" alt="">
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content" data-aos="fade-right">
            <h3>Discover Valuable Skills and Achieve Certifications.</h3>
            <p class="fst-italic">
              Enhance your career prospects by acquiring in-demand skills and certifications.
            </p>
            <ul>
              <li><i class="bi bi-check-circle"></i> Unlock new opportunities with expert-led courses.</li>
              <li><i class="bi bi-check-circle"></i> Acquire practical knowledge through hands-on learning.</li>
              <li><i class="bi bi-check-circle"></i> Expand your skill set and stay ahead in your field.</li>
            </ul>
            <p>
              Empower yourself with the tools and knowledge needed to succeed in today's competitive job market.
            </p>
          </div>
        </div>
  
      </div>
    </section><!-- End About Section -->
  
    

    <section id="classes" class="classes">
      <div class="container" data-aos="fade-up">
          <header class="section-header">
              <h2>Our Classes</h2>
              <p>Explore our range of classes</p>
          </header>
          <div class="row">
              @foreach($kelas as $class)
              <div class="col-lg-4 mb-4" data-aos="fade-up" data-aos-delay="{{ $loop->iteration * 200 }}">
                  <div class="card h-100">
                      <img src="{{ url('images/galerikelas/' . $class->foto) }}" class="card-img-top" alt="" style="height: 200px; object-fit: cover;">
                      <div class="card-body d-flex flex-column justify-content-between">
                          <h3 class="card-title">{{ $class->judul }}</h3>
                          <p class="card-text">{{ implode(' ', array_slice(str_word_count($class->deskripsi, 1), 0, 20)) }}...</p>
                          <div class="text-center">
                              <a href="{{ route('login') }}" class="btn btn-outline-info btn-lg btn-md">Daftar</a>
                          </div>
                      </div>
                  </div>
              </div>
              @endforeach
          </div>
      </div>
  </section><!-- End Classes Section -->
  
      
      
      



    <!-- Additional sections go here -->
  
  </main><!-- End #main -->
  

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">

    <div class="container">
      <h3>SISKAE</h3>
      <p>Experience the essence of innovation and creativity. Our journey unfolds with a passion for excellence, paving the way for transformative solutions. Together, we shape tomorrow's possibilities, one step at a time.</p>

      <div class="social-links">
        <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
        <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
        <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
        <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
  
  <!-- Vendor JS Files -->
  <script src="{{ asset('template/frontend/vendor/aos/aos.js') }}"></script>
  <script src="{{ asset('template/frontend/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('template/frontend/vendor/glightbox/js/glightbox.min.js') }}"></script>
  <script src="{{ asset('template/frontend/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
  <script src="{{ asset('template/frontend/vendor/php-email-form/validate.js') }}"></script>
  <script src="{{ asset('template/frontend/vendor/purecounter/purecounter.js') }}"></script>
  <script src="{{ asset('template/frontend/vendor/swiper/swiper-bundle.min.js') }}"></script>
  <script src="{{ asset('template/frontend/vendor/waypoints/noframework.waypoints.js') }}"></script>

  <!-- Template Main JS File -->
  <script src="{{ asset('template/frontend/js/main.js') }}"></script>

</body>

</html>