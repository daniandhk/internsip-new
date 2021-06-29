<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>

    {{-- Navbar.css --}}
    <link rel="stylesheet" type="text/css" href="{{ url('/css/navbar.css') }}">
    {{-- Custom.css --}}
    <link rel="stylesheet" type="text/css" href="{{ url('/css/custom.css') }}">
    {{-- Bootstrap --}}
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    {{-- AOS michalsnik.github.io/aos/ --}}
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    {{-- simple-sidebar.css --}}
    <link rel="stylesheet" type="text/css" href="{{ url('/css/simple-sidebar.css') }}">
    {{-- Animation.style --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    {{-- Datatable --}}
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.css">
</head>

<body>
    <div class="navbar-wrap">
        <nav class="navbar navbar-expand-lg navbar-light fixed-top bg-light">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                <img src="{{ url('/logo.png') }}" width="auto" height="30" alt="Internsip">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        @php
                        if(\Request::is('/')) {
                            echo '<a id="active" class="nav-link" href="#">Home</a>';
                        } else {
                            echo '<a id="nav-link" class="nav-link" href="'.url('/').'">Home</a>';
                        }
                        @endphp
                    </li>
                    <li class="nav-item">
                        @php
                        if(\Request::is('list-lowongan')) {
                            echo '<a id="active" class="nav-link" href="#">Cari Lowongan</a>';
                        } else {
                            echo '<a id="nav-link" class="nav-link" href="'.url('/list-lowongan').'">Cari Lowongan</a>';
                        }
                        @endphp
                    </li>
                    <!-- <li class="nav-item">
                        @php
                        if(\Request::is('list-perusahaan')) {
                            echo '<a id="active" class="nav-link" href="#">Cari Perusahaan</a>';
                        } else {
                            echo '<a id="nav-link" class="nav-link" href="'.url('/list-perusahaan').'">Cari Perusahaan</a>';
                        }
                        @endphp
                    </li> -->
                </ul>
                <ul class="navbar-nav mr-4" style="list-style-type: none;">
                    <li class="nav-item dropdown">
                        @if (session()->has('status'))
                            @php
                            $data = session('user');
                            $nama = $data->nama;
                            @endphp
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Hi, {{ $nama }}
                            </a>
                            <div class="dropdown-menu text-center" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{url('/profile')}}">Profile</a>
                                <a class="dropdown-item" href="{{url('/logout')}}">Logout</a>
                            </div>
                        @else
                            <a id="nav-text" style="list-style-type: none;" data-toggle="modal" data-target="#ModalLogin" class="nav-link"
                                href="">Login</a>
                        @endif
                    </li>
                </ul>
            </div>
        </div>
        </nav>
        <div id="carouselExampleControls" class="carousel slide bs-slider box-slider" data-ride="carousel" data-pause="hover" data-interval="false" >
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleControls" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleControls" data-slide-to="1"></li>
                <li data-target="#carouselExampleControls" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner" role="listbox">
                <div class="carousel-item active">
                    <div id="home" class="first-section" style="background-image:url('images/intern1.jpg');">
                        <div class="dtab">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 text-right">
                                        
                                    </div>
                                </div><!-- end row -->            
                            </div><!-- end container -->
                        </div>
                    </div><!-- end section -->
                </div>
                <div class="carousel-item">
                    <div id="home" class="first-section" style="background-image:url('images/intern2.jpg');">
                        <div class="dtab">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 text-left">
                                        
                                    </div>
                                </div><!-- end row -->            
                            </div><!-- end container -->
                        </div>
                    </div><!-- end section -->
                </div>
                </div>
                <!-- Left Control -->
                <a class="new-effect carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                    <span class="fa fa-angle-left" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
    
                <!-- Right Control -->
                <a class="new-effect carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                    <span class="fa fa-angle-right" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    </div>

    {{-- Bootstrap --}}
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>

    <!-- Modal Login -->
    <div id="ModalLogin" class="modal fade">
        <div class="modal-dialog modal-login">
            <div class="modal-content">
                <div class="modal-header">				
                    <h4 class="modal-title">Login</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="userLoginForm">
                        @csrf
                        <div class="form-group">
                            <select class="select form-control" name="role" id="role">
                                <option selected="role" value="Perusahaan">
                                    Perusahaan
                                </option>
                                <option selected="role" value="User">
                                    Pelamar
                                </option>
                            </select>
                        </div>
                        <div class="form-group">
                            <input name="email" id="email" type="email" class="form-control" placeholder="Email" required="required">
                        </div>
                        <div class="form-group">
                            <input name="password" id="password" type="password" class="form-control" placeholder="Password" required="required">					
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-success btn-block btn-lg" id="btnlogin" value="Login">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                <p>Don't have any account yet? <a href="{{ url('/register-user') }}">Register</a> here</p>
                </div>
            </div>
        </div>
    </div>    
    <!------------------------------------------------------------------------------>

    @yield('content')
</body>

</html>
