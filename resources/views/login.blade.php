<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login — Internsip</title>

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
    <!-- <link rel="stylesheet" href="sweetalert2.min.css"> -->
</head>

<body style="padding-top: 30px !important;">
    @if (session()->has('message'))
        <div class="alert alert-success text-center">
            {{ session()->get('message') }}
        </div>
    @endif
    <div class="container">
        <div style="background-color: #B8CFEC;">
        <div class="row text-center shadow mx-1">
            <div class="col-md-12 col-xs-12 col-sm-12">
                <div class="container">
                    <div class="col-12 py-5">
                        <h1>Login</h1>
                        @if ($message = Session::get('failed'))
                            <div id="alertbox" class="mx-auto col-6 alert alert-danger" role="alert">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                {{ $message }}
                            </div>
                        @endif
                    </div>
                    <div class="row">
                        <form method="POST" action="userLoginForm" class="w-100">
                            @csrf
                            <div class="row">
                                <div class="form-group col-8 mx-auto">
                                    <label for="role">Login as</label>
                                    <select class="select form-control" name="role" id="role">
                                        <option selected="role" value="Perusahaan">
                                            Perusahaan
                                        </option>
                                        <option selected="role" value="User">
                                            Pelamar
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-8 mx-auto">
                                    <label for="email">Email</label>
                                    <input name="email" type="email" class="form-control" id="email" required="required">
                                </div>
                            </div>
                            <div class="row pb-5">
                                <div class="form-group col-8 mx-auto">
                                    <label for="password">Password</label>
                                    <input name="password" type="password" class="form-control" id="password" required="required">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-8 mx-auto">
                                    <button class="btn btn-success btn-block btn-lg">Login</button>
                                    <p class="py-2 pt-4">Don't have any account yet? <a href="{{ url('/register-user') }}">Register</a> here</p>
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
    </div>


    {{-- Sweet Alert --}}
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    @if (session()->has('success'))
        <script>
            $(document).ready(function() {
                swal({
                    title: "Your account has been registered",
                    text: "You may login",
                    type: "success",
                    icon: "success"
                });
            });

        </script>
    @endif
    <!-- Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>

</body>

</html>
