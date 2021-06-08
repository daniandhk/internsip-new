<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register — Internsip</title>

    {{-- Bootstrap --}}
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    {{-- Navbar.css --}}
    <link rel="stylesheet" type="text/css" href="{{ url('/css/navbar.css') }}">
    {{-- Font-Awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/solid.min.css">
    {{-- Custom.css --}}
    <link rel="stylesheet" type="text/css" href="{{ url('/css/custom.css') }}">
    {{-- JQUERY --}}
    <script src="https://code.jquery.com/jquery-3.5.1.slim.js"
        integrity="sha256-DrT5NfxfbHvMHux31Lkhxg42LY6of8TaYyK50jnxRnM=" crossorigin="anonymous"></script>
</head>

<body style="padding-top: 30px !important;">
    <div class="container">
        <div class="row text-center shadow mx-1">
            <div class="col-md-12 col-xs-12 col-sm-12">
                <div class="container">
                    <div class="col-12 py-5">
                        <h1>Register Perusahaan</h1>
                    </div>
                    <div class="row">
                        <form method="POST" action="perusahaanRegisterForm" class="w-100" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="form-group col-8 mx-auto">
                                    <label for="">Nama Perusahaan</label>
                                    <input type="text" class="form-control" id="nama" name="nama" required>
                                    @error('nama')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-8 mx-auto">
                                    <label for="">Lokasi Pusat Perusahaan</label>
                                    <input type="text" class="form-control" id="lokasi" name="lokasi" required>
                                    @error('lokasi')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-8 mx-auto">
                                    <label for="">No. Telepon</label>
                                    <input type="text" class="form-control" id="telepon" name="telepon" required>
                                    @error('telepon')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-8 mx-auto">
                                    <label for="">Deskripsi</label>
                                    <input type="text" class="form-control" id="deskripsi" name="deskripsi" required>
                                    @error('deskripsi')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-8 mx-auto">
                                    <label for="">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" required>
                                    @error('email')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-8 mx-auto">
                                    <label for="">Password</label>
                                    <input type="password" class="form-control" id="password" name="password" required>
                                    @error('password')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row pb-5">
                                <div class="form-group col-8 mx-auto">
                                    <label for="">Repeat Password</label>
                                    <input type="password" class="form-control" id="validation" name="validation" required>
                                    @error('validation')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-8 mx-auto">
                                <button class="btn btn-success btn-block btn-lg">Submit</button>
                                    <p class="py-2 pt-4"><a href="{{ url('/register-user') }}">Register Pelamar</a></p>
                                    <p>Already have an account? <a href="{{url('/login')}}">Login</a> here</p>
                                    <p>Or</p>
                                    <p><a href="{{ url('/') }}">Go back to Home</a></p>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
