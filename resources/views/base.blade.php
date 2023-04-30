<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Tailor</title>
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.2.0/mdb.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
</head>

<body>
    <header>
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-light bg-pink">
            <!-- Container wrapper -->
            <div class="container-fluid">
                <!-- Toggle button -->
                <button class="navbar-toggler" type="button" data-mdb-toggle="collapse"
                    data-mdb-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fas fa-bars"></i>
                </button>

                <!-- Collapsible wrapper -->
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left links -->
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" aria-current="page"
                                href="/">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('order') ? 'active' : '' }}" href="order">Order
                                Now</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('services') ? 'active' : '' }}"
                                href="services">Services</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('about') ? 'active' : '' }}" href="about">About us</a>
                        </li>
                    </ul>
                    <!-- Left links -->
                </div>
                <!-- Collapsible wrapper -->

                <!-- Right elements -->
                <div class="d-flex align-items-center">
                    @if (Auth::check())
                        <!-- Right elements -->
                        <div class="d-flex align-items-center">
                            <!-- Avatar -->
                            <div class="dropdown">
                                <a class="dropdown-toggle d-flex align-items-center hidden-arrow" href="#"
                                    id="navbarDropdownMenuAvatar" role="button" data-mdb-toggle="dropdown"
                                    aria-expanded="false">
                                    <img src="https://mdbcdn.b-cdn.net/img/new/avatars/2.webp" class="rounded-circle"
                                        height="25" alt="Black and White Portrait of a Man" loading="lazy" />
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuAvatar">
                                    {{-- <li>
                                        <a class="dropdown-item" href="#">My profile</a>
                                    </li> --}}
                                    <li>
                                        <a class="dropdown-item" href="{{route('myorders')}}">My Orders</a>
                                    </li>
                                    <li>
                                        <form action="{{ route('logout') }}" method="POST">
                                            @csrf
                                            <input class="dropdown-item" type="submit" value="logout">
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- Right elements -->
                    @else
                        <!-- Right elements -->
                        <ul class="d-flex list-unstyled m-0 gap-3">
                            <li class="nav-item">
                                <a class="nav-link" href="login">Login</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="register">Sign up</a>
                            </li>
                        </ul>
                        <!-- Right elements -->
                    @endif
                </div>
                <!-- Right elements -->
            </div>
            <!-- Container wrapper -->
        </nav>
        <!-- Navbar -->
    </header>
    @yield('content')
    <!-- footer start -->
    <footer class="bg-pink text-white text-center text-lg-start mt-5">
        <!-- Grid container -->
        <div class="container p-4">
            <!--Grid row-->
            <div class="row">
                <!--Grid column-->
                <div class="col-lg-6 col-md-12 mb-4 mb-md-0">
                    <h5 class="text-uppercase">Tailor</h5>

                    <p>
                        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Iste
                        atque ea quis molestias. Fugiat pariatur maxime quis culpa
                        corporis vitae repudiandae aliquam voluptatem veniam, est atque
                        cumque eum delectus sint!
                    </p>
                </div>
                <!--Grid column-->

                <!--Grid column-->
                <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                    <h5 class="text-uppercase">contact us</h5>

                    <ul class="list-unstyled mb-0">
                        <li>
                            <a href="#" class="text-white"><i class="fab fa-facebook-f"></i> tailor</a>
                        </li>
                        <li>
                            <a href="#" class="text-white"><i class="fab fa-whatsapp"></i> 03457686875</a>
                        </li>
                        <li>
                            <a href="#" class="text-white"><i class="fab fa-instagram"></i> @tailor</a>
                        </li>
                        <li>
                            <a href="#" class="text-white"><i class="fab fa-twitter"></i> twitter/tailor</a>
                        </li>
                    </ul>
                </div>
                <!--Grid column-->

                <!--Grid column-->
                <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                    <h5 class="text-uppercase mb-0">Category</h5>

                    <ul class="list-unstyled">
                        <li>
                            <a href="#!" class="text-white">Man</a>
                        </li>
                        <li>
                            <a href="#!" class="text-white">Woman</a>
                        </li>
                        <li>
                            <a href="#!" class="text-white">Teen</a>
                        </li>
                        <li>
                            <a href="#!" class="text-white">Kids</a>
                        </li>
                    </ul>
                </div>
                <!--Grid column-->
            </div>
            <!--Grid row-->
        </div>
        <!-- Grid container -->

        <!-- Copyright -->
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.1)">
            © {{ date('Y') }} Copyright:
            <a class="text-white" href="https://mdbootstrap.com/">tailor.com</a>
        </div>
        <!-- Copyright -->
    </footer>
    <!-- footer end -->
    <!-- MDB -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.2.0/mdb.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    @yield('scripts')
</body>

</html>
