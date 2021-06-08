@extends('header')
@section('title', 'Cari Lowongan')
@section('content')

<div class="container pt-5">
    <div style="background-color: #ffffff;">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12" style="font-size: 3vw; text-align: center; color: #000000;">
                    <h1 class="mb-2 mt-4 font-weight-bold">Lowongan yang Tersedia</h1>
                </div>
            </div>
        </div>
    </div>
</div>

<section id="lowongan" class="container py-5">
    <div id="lowongan-list" class="row justify-content-center" style="background-color: #E5E5E5;">
        @foreach ($datas as $lowongan)
        <div class="col-md-6 col-lg-4 d-flex align-items-stretch">
            <div class="card w-100 border-0 mb-5 mt-5 pl-4 pr-4">
                <img class="img-fluid object-fit-contain" src="{{url('/images/Perusahaan').'/'.$lowongan->imageName}}" alt="{{$lowongan->nama_perusahaan}}">
                <div class="card-body">
                    <h5 style="font-size: xx-large;" class="card-title disabled text-center">{{$lowongan->nama_perusahaan}}</h5>
                    <p style="font-size: x-large;" class="card-text text-center ">{{$lowongan->jabatan}}</p>
                    <p style="font-size: x-large;" class="card-text text-center ">{{$lowongan->kota}}, {{$lowongan->jabatan}}</p>
                    <p style="font-size: x-large;" class="card-text text-center ">{{$lowongan->durasi}}</p>
                    <p style="font-size: x-large;" class="card-text text-center ">{{$lowongan->gaji}}</p>
                    <p style="font-size: x-large;" class="merch-desc card-text text-center pr-3 pl-3 pb-1" style="min-height:64px;">{{Str::limit($lowongan->deskripsi, 60)}}</p>
                    <div style="display: flex; justify-content: center;" class="w-100">
                        <button type="button" style="position: relative; bottom:0; justify-content:center; min-width: 180px;" class="mx-auto btn btn-primary mx-auto"
                        data-toggle="modal" data-target="#modalDetail{{ $loop->index }}">Click For Details</button>
                    </div>
                    <div style="display: flex; justify-content: center;" class="w-100 pt-1">
                        <!-- Panggil modal -->
                        <button type="button" style="position: relative; bottom:0; justify-content:center; min-width: 180px;" class="mx-auto btn btn-success mx-auto"
                        data-toggle="modal" data-target="#modalDetail{{ $loop->index }}">Apply Now</button>
                    </div>
                </div>
            </div>
        </div>
        <div id="modalDetail{{ $loop->index }}" class="modal fade" role="dialog" tabindex="-1" style="padding-right: 0 !important;">
            <div class="modal-dialog modal-lg rounded 0" role="document">
                <div class="modal-content">
                    <div class="modal-body mb-0 p-0 modal-gallery-detail" style="text-align: center;">
                        <button style="position: absolute; right: 1rem; top:0.5rem" type="button"
                            class="close mx-auto" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <img class="img-fluid"
                            src="{{ url('/images/Perusahaan') . '/' . $lowongan->imageName }}" alt="{{$lowongan->nama_perusahaan}}">
                        <hr>
                        <div class="px-4" style="text-align: justify">
                            <h2>{{$lowongan->nama_perusahaan}}</h2>
                            <h4 class="">{{$lowongan->jabatan}}</h4>
                            <h4 class="">{{$lowongan->kota}}, {{$lowongan->jabatan}}</h4>
                            <h4 class="">{{$lowongan->jabatan}}</h4>
                            <h4 class="">{{$lowongan->gaji}}</h4>
                            <p style="text-indent:50px">{{$lowongan->deskripsi}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</section>

@endsection
