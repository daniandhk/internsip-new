@extends('header')
@section('title', 'Home')
@section('content')

    <div class="homepage">
        <div class="container p-4 mt-4">
            <div class="col-xl-6 col-md-8 col-sm-12 mt-4 p-4" style="background-color: #E5E5E5">    
                    <div class="form-group">
                        <h4 class="font-weight-bold ml-2 mr-2">Terdapat</h4>
                        <h3 class="font-weight-bold ml-2 mr-2">{{$count_perusahaan}} Perusahaan yang terdaftar</h4>
                    </div>
                    <div class="form-group">
                    <h4 class="font-weight-bold ml-2 mr-2">dengan total</h4>
                        <h3 class="font-weight-bold ml-2 mr-2">{{$count_lowongan}} Lowongan yang tersedia!</h4>
                    </div>
                    <div class="form-group ml-2 mr-2">
                        <button onclick="location.href='{{ url('/list-lowongan') }}'" class="btn btn-primary" type="submit"> Cari Lowongan! </button>
                    </div>
            </div>
        </div>
    </div>

@endsection
