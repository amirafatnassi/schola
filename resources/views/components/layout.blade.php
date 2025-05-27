@props(['title' => ''])

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>{{ $title ?: 'Schola template' }}</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

    <!-- Favicon -->
    <link href="{{ asset('img/favicon.ico') }}" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('lib/animate/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

</head>

<body>

    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->

    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0">
        <a href="{{url('index')}}" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
            <h2 class="m-0"><i class="fa fa-book me-3"></i>Schola</h2>
        </a>
        <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto p-4 p-lg-0">
                <a href="{{url('home')}}" class="nav-item nav-link active">Home</a>
                <a href="{{url('about')}}" class="nav-item nav-link">A propos</a>
                <a href="{{url('courses')}}" class="nav-item nav-link">Courses</a>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                    <div class="dropdown-menu fade-down m-0">
                        <a href="{{url('instructors')}}" class="dropdown-item">Instructors</a>
                        <a href="{{url('students')}}" class="dropdown-item">Students</a>
                        <a href="{{url('testimonial')}}" class="dropdown-item">Témoignages</a>
                        <a href="{{url('404')}}" class="dropdown-item">404 Page</a>
                    </div>
                </div>
                <a href="{{url('contact')}}" class="nav-item nav-link">Contact</a>
                @guest
                <a href="{{ route('login') }}" class="btn btn-primary py-4 px-lg-5 mb-1">Log in<i class="fa fa-arrow-right ms-3"></i></a>

                <a href="{{ route('register') }}" class="btn btn-primary py-4 px-lg-5">Register<i class="fa fa-arrow-right ms-3"></i></a>
                @endguest
                @auth
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle btn btn-primary py-4 px-lg-5" data-bs-toggle="dropdown"><i class="fa fa-arrow-right ms-3"></i> {{Auth::user()->firstname}} {{Auth::user()->lastname}}</a>
                    <div class="dropdown-menu fade-down m-0">
                        <a href="{{url('profile')}}" class="dropdown-item">My profile</a>
                        <a href="{{url('my-courses') }}" class="dropdown-item">My courses</a>
                        <a href="{{url('testimonial')}}" class="dropdown-item">Témoignages</a>
                        <a href="{{url('404')}}" class="dropdown-item">404 Page</a>
                    </div>
                </div>
                @endauth
            </div>
        </div>
    </nav>
    <!-- Navbar End -->

    <!-- Main Content -->
    {{ $slot }}

    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-light footer pt-5 mt-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-4 col-md-6">
                    <h4 class="text-white mb-3">Liens rapides</h4>
                    <a class="btn btn-link" href="">A propos de nous</a>
                    <a class="btn btn-link" href="">Contactez nous</a>
                    <a class="btn btn-link" href="">Termes & Conditions</a>
                    <a class="btn btn-link" href="">FAQs</a>
                </div>
                <div class="col-lg-4 col-md-6">
                    <h4 class="text-white mb-3">Contact</h4>
                    <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>Rue indépendance, Tunis, Tunisie</p>
                    <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>+216 12 345 678</p>
                    <p class="mb-2"><i class="fa fa-envelope me-3"></i>info@ehr-tech.com</p>
                    <div class="d-flex pt-2">
                        <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-youtube"></i></a>
                        <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <h4 class="text-white mb-3">Gallerie</h4>
                    <div class="row g-2 pt-2">
                        <div class="col-4">
                            <img class="img-fluid bg-light p-1" src="img/course-1.jpg" alt="">
                        </div>
                        <div class="col-4">
                            <img class="img-fluid bg-light p-1" src="img/course-2.jpg" alt="">
                        </div>
                        <div class="col-4">
                            <img class="img-fluid bg-light p-1" src="img/course-3.jpg" alt="">
                        </div>
                        <div class="col-4">
                            <img class="img-fluid bg-light p-1" src="img/course-2.jpg" alt="">
                        </div>
                        <div class="col-4">
                            <img class="img-fluid bg-light p-1" src="img/course-3.jpg" alt="">
                        </div>
                        <div class="col-4">
                            <img class="img-fluid bg-light p-1" src="img/course-1.jpg" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="copyright">
                <div class="row">
                    <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                        &copy; <a class="border-bottom" href="#">Schola</a>, All Right Reserved.
                        Designed By <a class="border-bottom" href="https://ehr-tech.com">EHR tech</a><br><br>
                    </div>
                    <div class="col-md-6 text-center text-md-end">
                        <div class="footer-menu">
                            <a href="">Home</a>
                            <a href="">Help</a>
                            <a href="">FQAs</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('lib/wow/wow.min.js') }}"></script>
    <script src="{{ asset('lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('lib/owlcarousel/owl.carousel.min.js') }}"></script>

    <!-- Template Javascript -->
    <script src="{{ asset('js/main.js') }}"></script>
</body>

</html>
