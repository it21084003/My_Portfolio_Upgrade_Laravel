<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <!-- Bootstrap CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/e9cf267fe2.js" crossorigin="anonymous"></script>
    <!-- External CSS -->
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
</head>

<body>

    <!--Nav Bar-->


    <nav class="navbar fixed-top navbar-expand-lg navbar-light">
        <a class="navbarbrand ps-3" href="#home-sec">I AM MORE</a>
        {{-- <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button> --}}
        <button class="navbar-toggler mx-3" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse justify-content-end " id="navbarNav">
            <ul class="navbar-nav ">

                <li class="nav-item">
                    <a class="nav-link" href="/#skill-sec">Skills</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/#service-sec">Service</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/#aboutme-sec">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/#project-sec">Project</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{url('/post')}}">Post</a>
                </li>
                {{-- <li class="nav-item">
                    <a class="nav-link" href="#contact-sec">Contact</a>
                </li> --}}
                @if(Auth::check())
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle"
                        data-bs-toggle="dropdown">
                        <span>{{strToUpper(Auth::user()->name)}}</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="#" class="dropdown-item">User Profile</a>
                        </li>
                        <li>
                            <a href="{{ route('logout') }}"  onclick="event.preventDefault();if(confirm('Are you sure you want to logout?')){document.getElementById('logout-form').submit();}" class="dropdown-item">Logout</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                            class="d-none">
                            @csrf
                        </form>
                        </li>
                    </ul>
                </li>
                @else
                <li class="nav-item">
                    <a class="nav-link" href="{{url('/login')}}">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{url('/register')}}">Register</a>
                </li>
                @endif
            </ul>
        </div>
    </nav>


    @yield('content')

    <!--Footer Section-->
    <section class="footer-section">
        <p>Copyright © by Antt Min Paing</p>
    </section>

    <!-- <script src="script.js"></script> -->
    <!-- Bootstrap JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"
        integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous">
    </script>

</body>

</html>
