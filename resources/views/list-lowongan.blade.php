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
    <div id="lowongan-list" class="row justify-content-center" style="background-color: #E6E6E6;">
        @foreach ($lowongan as $lowongan)
            @php
                $temp = null
            @endphp
            @foreach ($perusahaan as $perusahaan)
                @if ($perusahaan->id == $lowongan->id_perusahaan)
                    @php
                        $temp = $perusahaan
                    @endphp
                    @break
                @endif
            @endforeach
        <div class="col-md-6 col-lg-4 d-flex align-items-stretch">
            <div class="card w-100 border border-white mb-5 mt-5">
                <img class="img-fluid object-fit-contain" src="{{url('/images/Avatar').'/'.$temp->imageName}}" alt="{{$temp->nama}}">
                <div class="card-body pl-4 pr-4">
                    <p style="font-size: x-large;" class="card-title disabled text-center">{{$temp->nama}}</p>
                    <h5 style="font-size: xx-large;" class="card-text text-center ">{{$lowongan->jabatan}}</h5>
                    <p style="font-size: x-large;" class="card-text text-center ">{{$lowongan->kota}}</p>
                    <p style="font-size: x-large;" class="card-text text-center ">{{$lowongan->alamat}}</p>
                    <p style="font-size: x-large;" class="card-text text-center ">{{$lowongan->durasi}} Bulan</p>
                    <p style="font-size: x-large;" class="card-text text-center ">Rp. {{$lowongan->gaji}} / Bulan</p>
                    <p style="font-size: x-large;" class="merch-desc card-text text-center pr-3 pl-3 pb-1" style="min-height:64px;">{{Str::limit($lowongan->deskripsi, 60)}}</p>
                    <div style="display: flex; justify-content: center;" class="w-100">
                        @if(session('status') == 'LOGGED_IN')
                        <button type="button" style="position: relative; bottom:0; justify-content:center; min-width: 180px;" class="mx-auto btn btn-primary mx-auto"
                        data-toggle="modal" data-target="#modalDetail{{ $loop->index }}">Click For Details</button>
                        @else
                        <button type="button" style="position: relative; bottom:0; justify-content:center; min-width: 180px;" class="mx-auto btn btn-primary mx-auto"
                        data-toggle="modal" data-target="#ModalLogin">Click For Details</button>
                        @endif
                    </div>
                    @if(session('role') != 'Perusahaan')
                    <div style="display: flex; justify-content: center;" class="w-100 pt-1">
                        @if(session('status') == 'LOGGED_IN')
                        <button type="button" style="position: relative; bottom:0; justify-content:center; min-width: 180px;" class="mx-auto btn btn-success mx-auto"
                        data-toggle="modal" data-target="#lamaranAdd{{ $loop->index }}">Apply Now</button>
                        @else
                        <button type="button" style="position: relative; bottom:0; justify-content:center; min-width: 180px;" class="mx-auto btn btn-success mx-auto"
                        data-toggle="modal" data-target="#ModalLogin">Apply Now</button>
                        @endif
                    </div>
                    @endif
                </div>
            </div>
        </div>
        <div id="modalDetail{{ $loop->index }}" class="modal fade" role="dialog" tabindex="-1" style="padding-right: 0 !important;">
            <div class="modal-dialog modal-lg rounded 0" role="document">
                <div class="modal-content">
                    <div class="modal-body mb-0 p-0" style="text-align: center;">
                        <button style="position: absolute; right: 1rem; top:0.5rem" type="button"
                            class="close mx-auto" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <img class="img-fluid"
                            src="{{ url('/images/Avatar') . '/' . $temp->imageName }}" alt="{{$temp->nama_perusahaan}}">
                        <hr>
                        <div class="px-4" style="text-align: justify">
                            <h2>{{$temp->nama}}</h2>
                            <h4>{{$lowongan->jabatan}}</h4>
                            <p>{{$lowongan->kota}}</p>
                            <p>{{$lowongan->alamat}}</p>
                            <p>{{$lowongan->durasi}} Bulan</p>
                            <p>Rp. {{$lowongan->gaji}} / Bulan</p>
                            <p>Details:</p>
                            <p>{{$lowongan->deskripsi}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="lamaranAdd{{ $loop->index }}" tabindex="-1" style="padding-right: 0 !important;"
            role="dialog" aria-labelledby="lamaranAdd{{ $loop->index }}"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title"
                            id="lamaranAdd{{ $loop->index }}">
                            {{$temp->nama}} | {{$lowongan->jabatan}}</h5>
                        <button type="button" class="close" data-dismiss="modal"
                            aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="addLamaran"
                            method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id_lowongan" value="{{ $lowongan->id }}">
                            <input type="hidden" name="id_perusahaan" value="{{ $temp->id }}">
                            <div class="form-group row">
                                <label for="uploadCv" class="col-sm-3 col-form-label">Your CV (PDF)</label>
                                <div class="col-sm-9">
                                    <input type="file" name="cv_file" accept="application/pdf" class="form-control"
                                        style="border: 0" id="uploadCv" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-3">
                                    <button class="btn btn-primary"
                                        type="submit">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</section>

{{-- Sweet Alert --}}
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
@if (session()->has('uploaded'))
    <script>
        $(document).ready(function() {
            swal({
                title: "Successfully registered your CV!",
                text: "You may check your profile",
                type: "success",
                icon: "success"
            });
        });

    </script>
@endif

@if (session()->has('duplicated'))
    <script>
        $(document).ready(function() {
            swal({
                title: "You already applied for this internship!",
                text: "You may check your profile",
                type: "error",
                icon: "error"
            });
        });

    </script>
@endif

@if (session()->has('file_null'))
    <script>
        $(document).ready(function() {
            swal({
                title: "Please select a correct file!",
                text: "You may try again",
                type: "error",
                icon: "error"
            });
        });

    </script>
@endif

@if (session()->has('error'))
    <script>
        $(document).ready(function() {
            swal({
                title: "Error!",
                text: "You may try again",
                type: "error",
                icon: "error"
            });
        });

    </script>
@endif

@endsection
