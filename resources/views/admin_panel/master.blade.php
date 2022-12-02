<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        {{-- fontawesome --}}
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
    .sidenavbar a{
        text-decoration: none;
    }

    </style>
</head>

<body>

    <div class="container-fluid">
        <div class="row g-0">
            <!-- side bar start -->
            <nav class="col-2 bg-dark p-3 sidenavbar">
                <a href="{{url('admin/dashboard')}}">
                    <h1 class="h4 py-2 text-center text-white">
                        <i class="fa-solid fa-person-circle-check"></i>
                        <span class="d-none d-lg-inline">
                            Personal Blog
                        </span>
                    </h1>
                </a>
                <hr style="color: white;">
                <div class="list-group h5 text-center text-lg-start ">
                    <a href="{{url('admin/skills')}}" >
                        <i class="fa-sharp fa-solid fa-star pb-3"></i>
                        <span class="d-none d-lg-inline">Skill</span>
                    </a>
                    <a href="{{url('admin/users')}}">
                        <i class="fa-sharp fa-solid fa-users-between-lines pb-3"></i>
                        <span class="d-none d-lg-inline">User</span>
                    </a>
                    <a href="{{url('admin/projects')}}">
                        <i class="fa-sharp fa-solid fa-diagram-project pb-3"></i>
                        <span class="d-none d-lg-inline">Project</span>
                    </a>
                    <a href="{{route('student_counts.index')}}">
                        <i class="fa-sharp fa-solid fa-graduation-cap pb-3"></i>
                        <span class="d-none d-lg-inline">Student</span>
                    </a>
                    <a href="{{route('posts.index')}}">
                        <i class="fa-solid fa-newspaper pb-3"></i>
                        <span class="d-none d-lg-inline">Post</span>
                    </a>
                    <a href="{{route('category.index')}}">
                        <i class="fa-solid fa-list"></i>
                        <span class="d-none d-lg-inline">Category</span>
                    </a>
                </div>
            </nav>
                <!-- side bar end -->
            <main class="col-10 bg-light">
                {{-- nav start --}}
                <nav class="navbar navbar-expand-lg bg-dark mb-4" >
                    <div class="flex-fill"></div>
                    <div class="navbar nav bg-dark navbar-dark text-white">
                        <li class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle"
                                data-bs-toggle="dropdown">
                                <span>{{ Auth::user()->name }}</span>
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="#" class="dropdown-item">User Profile</a>
                                </li>
                                <li>
                                    <a href="{{ route('logout') }}"  onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();" class="dropdown-item">Logout</a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    class="d-none">
                                    @csrf
                                </form>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link"><i class="fas fa-cog"></i></a>
                        </li>
                    </div>
                </nav>
                {{-- nav end --}}
                {{-- main call --}}
                @yield('content')
            </main>


        </div>
    </div>





    <!-- bootstrap javascript -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"
        integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
    @yield('javascript')
</body>

</html>
