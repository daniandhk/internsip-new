@extends('header')
@section('title', 'Home')
@section('content')

<div class="d-flex mt-5" id="wrapper">
    <div class="bg-light pt-2" id="sidebar-wrapper">
        <div class="list-group list-group-flush">
            <a href="#" id="profile_button" class="list-group-item list-group-item-action bg-light">Profile</a>
            @if (session('role') == 'Perusahaan')
                <a href="#" id="lowongan_button" class="list-group-item list-group-item-action bg-light">List Lowongan</a>
            @endif
            <a href="#" id="lamaran_button" class="list-group-item list-group-item-action bg-light">List Lamaran</a>
        </div>
    </div>

    <div id="page-content-wrapper">
        <div id="profile" class="container-fluid">
            <img src="{{url('/images/Avatar').'/'.$profile->imageName}}" style="padding-top: 8%; height:100%; width:auto; max-height:280px">
            <div class="container pt-4 pb-4">
                <div class="container">
                    <div class="col-md-8 col-sm-12">
                        <form action="updateProfile/{{$profile->id}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                @if (session('role') == 'Perusahaan')
                                <label for="nama" class="col-sm-3 col-form-label">Nama Perusahaan</label>
                                @elseif (session('role') == 'Pelamar')
                                <label for="nama" class="col-sm-3 col-form-label">Nama Lengkap</label>
                                @endif
                                <div class="col-sm-9">
                                    <input type="text" name="nama" class="form-control" id="nama" required
                                        style="color: #000000;" value="{{$profile->nama}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="telepon" class="col-sm-3 col-form-label">No. Telepon</label>
                                <div class="col-sm-9">
                                    <input type="text" name="telepon" class="form-control" id="telepon"
                                        required style="color: #000000;" value="{{$profile->telepon}}">
                                </div>
                            </div>
                            @if (session('role') == 'Perusahaan')
                            <div class="form-group row">
                                <label for="lokasi" class="col-sm-3 col-form-label">Lokasi Pusat</label>
                                <div class="col-sm-9">
                                    <input type="text" name="lokasi" class="form-control" id="lokasi" required
                                        style="color: #000000;" value="{{$profile->lokasi}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="deskripsi" class="col-sm-3 col-form-label">Deskripsi</label>
                                <div class="col-sm-9">
                                    <textarea style="color: #000000;"
                                        name="deskripsi" class="form-control" id="deskripsi" rows="3"
                                        required>{{$profile->deskripsi}}</textarea>
                                </div>
                            </div>
                            @elseif (session('role') == 'Pelamar')
                            <div class="form-group row">
                                <label for="ttl" class="col-sm-3 col-form-label">Tempat, Tanggal Lahir</label>
                                <div class="col-sm-9">
                                    <input type="text" name="ttl" class="form-control" id="ttl" required
                                        style="color: #000000;" value="{{$profile->ttl}}">
                                </div>
                            </div>
                            @endif
                            <div class="form-group row">
                                <label for="email" class="col-sm-3 col-form-label">Email</label>
                                <div class="col-sm-9">
                                    <input type="email" name="email" class="form-control" id="email"
                                        style="color: #000000;" value="{{$profile->email}}">
                                    @error('email')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="password" class="col-sm-3 col-form-label">Update Password</label>
                                <div class="col-sm-9">
                                    <input type="password" name="password" class="form-control" id="password"
                                        style="color: #000000;">
                                    @error('password')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="validation" class="col-sm-3 col-form-label">Repeat Password</label>
                                <div class="col-sm-9">
                                    <input type="password" name="validation" class="form-control" id="validation"
                                        style="color: #000000;">
                                    @error('validation')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="uploadGambar" class="col-sm-3 col-form-label">Profile Picture</label>
                                <div class="col-sm-9">
                                    <input type="file" name="image_file" accept="image/*" class="form-control"
                                        style="border: 0" id="uploadGambar">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-3">
                                    <button class="btn btn-success" type="submit">Update Profile</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div> 
            </div> 
        </div>

        @if (session('role') == 'Perusahaan')
        <div id="lowongan" style="display:none;" class="container-fluid">
            <h1 class="mt-4">Lowongan</h1>
            <div class="container pt-4 pb-4">
                <div class="container">
                    <div class="row">
                        <div class="col-md-8 col-sm-12">
                            <form action="addLowongan" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group row">
                                    <label for="jabatan" class="col-sm-3 col-form-label">Posisi Internship</label>
                                    <div class="col-sm-9 row">
                                        <input type="text" name="jabatan" class="form-control" id="jabatan" required
                                            style="color: #000000;">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="nama_artis_textbox" class="col-sm-3 col-form-label">Kota/Kabupaten</label>
                                    <div class="col-sm-9 row justify-content-center text-center">
                                        <select style="color: #000000;" class="select form-control col-sm-4" name="jenis_wilayah" id="jenis_wilayah">
                                        <option selected="jenis_wilayah" value="Kota">
                                                Kota
                                            </option>
                                            <option selected="jenis_wilayah" value="Kabupaten">
                                                Kabupaten
                                            </option>
                                        </select>
                                        <input name="nama_wilayah" type="text" id="nama_wilayah" class="form-control col-sm-8" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="alamat" class="col-sm-3 col-form-label">Alamat</label>
                                    <div class="col-sm-9 row">
                                        <textarea style="color: #000000; resize: none;"
                                            name="alamat" class="form-control" id="alamat" rows="3"
                                            required></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="durasi" class="col-sm-3 col-form-label">Durasi</label>
                                    <div class="col-sm-2 row">
                                        <input type="number" name="durasi" min="0" class="form-control" id="durasi" required
                                            style="color: #000000;">
                                    </div>
                                    <label class="col-sm-7 col-form-label">Bulan</label>
                                </div>
                                <div class="form-group row">
                                    <label for="gaji" class="col-sm-3 col-form-label">Gaji</label>
                                    <label class="row col-sm-1 col-form-label">Rp.</label>
                                    <div class="col-sm-6">
                                        <input type="number" name="gaji" min="0" class="form-control" id="gajiTB" required
                                            style="color: #000000;" value="0">
                                    </div>
                                    <label class="col-sm-2 col-form-label">/ Bulan</label>
                                </div>
                                <div class="form-group row">
                                    <label for="deskripsi" class="col-sm-3 col-form-label">Deskripsi</label>
                                    <div class="col-sm-9 row">
                                        <textarea style="color: #000000;"
                                            name="deskripsi" class="form-control" id="deskripsi" rows="3"
                                            required></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-3">
                                        <button class="btn btn-primary btn-sm" type="submit">Tambah Lowongan</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-12" style="overflow-x: auto;">
                            <table id="tableLowongan" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Posisi</th>
                                        <th scope="col">Kota/Kabupaten</th>
                                        <th scope="col">Alamat</th>
                                        <th scope="col">Durasi</th>
                                        <th scope="col">Gaji</th>
                                        <th scope="col">Deskripsi</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $no = 1;
                                    @endphp
                                    @foreach ($lowongan as $lowongan_data)
                                    @if ($lowongan_data->id_perusahaan == $profile->id)
                                        <tr>
                                            <th scope="row">{{ $loop->iteration }}</th>
                                            <td>{{ $lowongan_data->jabatan }}</td>
                                            <td>{{ $lowongan_data->kota }}</td>
                                            <td>{{ $lowongan_data->alamat }}</td>
                                            <td>{{ $lowongan_data->durasi }} Bulan</td>
                                            <td>Rp.{{ $lowongan_data->gaji }} / Bulan</td>
                                            <td>{{ Str::limit($lowongan_data->deskripsi, 120) }}</td>
                                            <td>
                                            <div class="row justify-content-center text-center">
                                                <button class="btn btn-info m-1" data-toggle="modal"
                                                    data-target="#lowonganEdit{{ $loop->iteration }}">Edit</button>
                                                <button class="btn btn-danger m-1" data-toggle="modal"
                                                    data-target="#lowonganDelete{{ $loop->iteration }}">Delete</button>
                                            </div>
                                            </td>
                                        </tr>

                                        <div class="modal fade" id="lowonganEdit{{ $loop->iteration }}" tabindex="-1" style="padding-right: 0 !important;"
                                            role="dialog" aria-labelledby="lowonganEdit{{ $loop->iteration }}"
                                            aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title"
                                                            id="lowonganEdit{{ $loop->iteration }}">
                                                            Edit : {{ $lowongan_data->jabatan }}</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="updateLowongan/{{ $lowongan_data->id }}"
                                                            method="POST" enctype="multipart/form-data">
                                                            @csrf
                                                            <div class="form-group row">
                                                                <label for="jabatan" class="col-sm-3 col-form-label">Posisi Internship</label>
                                                                <div class="col-sm-9 row">
                                                                    <input type="text" name="jabatan" value="{{ $lowongan_data->jabatan }}" class="form-control" id="jabatan" required
                                                                        style="color: #000000;">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="nama_artis_textbox" class="col-sm-3 col-form-label">Kota/Kabupaten</label>
                                                                <div class="col-sm-9 row">
                                                                    <input name="nama_wilayah" type="text" id="nama_wilayah" value="{{ $lowongan_data->kota }}" class="form-control" required>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="alamat" class="col-sm-3 col-form-label">Alamat</label>
                                                                <div class="col-sm-9 row">
                                                                    <textarea style="color: #000000; resize: none;"
                                                                        name="alamat" class="form-control" id="alamat" rows="3"
                                                                        required>{{ $lowongan_data->alamat }}</textarea>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="durasi" class="col-sm-3 col-form-label">Durasi</label>
                                                                <div class="col-sm-3">
                                                                    <input type="number" name="durasi" value="{{ $lowongan_data->durasi }}" min="0" class="form-control" id="durasi" required
                                                                        style="color: #000000;">
                                                                </div>
                                                                <label class="col-sm-6 col-form-label">Bulan</label>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="gaji" class="col-sm-3 col-form-label">Gaji</label>
                                                                <label class="col-sm-1 col-form-label">Rp.</label>
                                                                <div class="col-sm-6">
                                                                    <input type="number" name="gaji" min="0" value="{{ $lowongan_data->gaji }}" class="form-control" id="gajiTB" required
                                                                        style="color: #000000;" value="0">
                                                                </div>
                                                                <label class="col-sm-2 col-form-label">/ Bulan</label>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="deskripsi" class="col-sm-3 col-form-label">Deskripsi</label>
                                                                <div class="col-sm-9 row">
                                                                    <textarea style="color: #000000;"
                                                                        name="deskripsi" class="form-control" id="deskripsi" rows="3"
                                                                        required>{{ $lowongan_data->deskripsi }}</textarea>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <div class="col-sm-3">
                                                                    <button class="btn btn-primary"
                                                                        type="submit">Update</button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="modal fade" id="lowonganDelete{{ $loop->iteration }}"
                                            tabindex="-1" style="padding-right: 0 !important;" role="dialog"
                                            aria-labelledby="lowonganDelete{{ $loop->iteration }}" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title"
                                                            id="lowonganDelete{{ $loop->iteration }}">
                                                            Hapus : {{ $lowongan_data->jabatan }}</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="deleteLowongan/{{ $lowongan_data->id }}"
                                                            method="POST">
                                                            <p>Apakah anda yakin menghapus item
                                                                <b>{{ $lowongan_data->jabatan }}</b> ?
                                                            </p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Close</button>
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger">Hapus</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif

        @if (session('role') == 'Perusahaan')
        <div id="lamaran" style="display:none;" class="container-fluid">
            <h1 class="mt-4">Lamaran</h1>
            <div class="container pt-4 pb-4">
                <div class="container">
                    <div class="row">
                        <div class="col-12" style="overflow-x: auto;">
                            <table id="tableLamaran" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Pelamar</th>
                                        <th scope="col">e-mail</th>
                                        <th scope="col">Posisi</th>
                                        <th scope="col">CV</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $no = 1;
                                    @endphp
                                    @foreach ($lamaran as $lamaran)

                                    @php
                                        $data_pelamar = null;
                                        $data_lowongan = null;
                                    @endphp
                                    @foreach ($pelamar as $temp_pelamar)
                                        @if ($temp_pelamar->id == $lamaran->id_pelamar)
                                            @php
                                                $data_pelamar = $temp_pelamar
                                            @endphp
                                            @break
                                        @endif
                                    @endforeach

                                    @foreach ($lowongan as $temp_lowongan)
                                        @if ($temp_lowongan->id == $lamaran->id_lowongan)
                                            @php
                                                $data_lowongan = $temp_lowongan
                                            @endphp
                                            @break
                                        @endif
                                    @endforeach

                                    @if ($lamaran->id_perusahaan == $profile->id)
                                        <tr>
                                            <th scope="row">{{ $loop->iteration }}</th>
                                            <td>{{ $data_pelamar->nama }}</td>
                                            <td>{{ $data_pelamar->email}}</td>
                                            <td>{{ $data_lowongan->jabatan }}</td>
                                            <td>
                                                <div class="row justify-content-center text-center">
                                                    <button class="m-1 btn btn-primary" data-toggle="modal"
                                                        data-target="#viewCv">View</button>
                                                    <form class="m-1" action="downloadCv/{{ $lamaran->id }}">
                                                    <button class="btn btn-secondary" 
                                                    type="submit">Download</button>
                                                    </form>
                                                </div>
                                            </td>
                                            <td>{{ $lamaran->status }}</td>
                                            <td >
                                                <div class="row justify-content-center text-center">
                                                    <form method="POST" action="confirmLamaran/{{ $lamaran->id }}">
                                                        @csrf
                                                        <button class="m-1 btn btn-success" type="submit">Confirm</button>
                                                    </form>
                                                    <form class="m-1" method="POST" action="declineLamaran/{{ $lamaran->id }}">
                                                        @csrf
                                                        <button class="btn btn-danger" type="submit"}">Decline</button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>

                                        <div class="modal fade" id="viewCv"
                                            tabindex="-1" style="padding-right: 0 !important;" role="dialog"
                                            aria-labelledby="viewCv" aria-hidden="true">
                                            <div class="modal-dialog modal-xl" style="max-height:80%;" role="document">
                                                <div class="modal-content" style="height:600px;">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title"
                                                            id="viewCv">CV 
                                                            {{$data_pelamar->nama}}</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <iframe src="./files/CV/{{$lamaran->cvName}}" frameborder="0" height="100%" width="100%">
                                                    </iframe>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif

        @if (session('role') == 'Pelamar')
        <div id="lamaran" style="display:none;" class="container-fluid">
            <h1 class="mt-4">Lamaran</h1>
            <div class="container pt-4 pb-4">
                <div class="container">
                    <div class="row">
                        <div class="col-12" style="overflow-x: auto;">
                            <table id="tableLamaran" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Perusahaan</th>
                                        <th scope="col">Posisi</th>
                                        <th scope="col">CV</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $no = 1;
                                    @endphp
                                    @foreach ($lamaran as $lamaran)

                                    @php
                                        $data_perusahaan = null;
                                        $data_lowongan = null;
                                    @endphp
                                    @foreach ($perusahaan as $temp_perusahaan)
                                        @if ($temp_perusahaan->id == $lamaran->id_perusahaan)
                                            @php
                                                $data_perusahaan = $temp_perusahaan
                                            @endphp
                                            @break
                                        @endif
                                    @endforeach

                                    @foreach ($lowongan as $temp_lowongan)
                                        @if ($temp_lowongan->id == $lamaran->id_lowongan)
                                            @php
                                                $data_lowongan = $temp_lowongan
                                            @endphp
                                            @break
                                        @endif
                                    @endforeach

                                    @if ($lamaran->id_pelamar == $profile->id)
                                        <tr>
                                            <th scope="row">{{ $loop->iteration }}</th>
                                            <td>{{ $data_perusahaan->nama }}</td>
                                            <td>{{ $data_lowongan->jabatan }}</td>
                                            <td>
                                                <div class="row justify-content-center text-center">
                                                    <button class="m-1 btn btn-primary" data-toggle="modal"
                                                        data-target="#viewCv">View</button>
                                                    <form class="m-1" action="downloadCv/{{ $lamaran->id }}">
                                                    <button class="btn btn-secondary" 
                                                    type="submit">Download</button>
                                                    </form>
                                                </div>
                                            </td>
                                            <td>
                                            @if ($lamaran->status == "Verifying")
                                            <button class="btn btn-warning m-1" data-toggle="modal"
                                                        data-target="#modalStatus">Verifying</button>
                                            @elseif ($lamaran->status == "Confirmed")
                                            <button class="btn btn-success m-1" data-toggle="modal"
                                                        data-target="#modalStatus">Confirmed</button>
                                            @elseif ($lamaran->status == "Declined")
                                            <button class="btn btn-danger m-1" data-toggle="modal"
                                                        data-target="#modalStatus">Declined</button>
                                            @endif
                                            </td>
                                            <td >
                                                <div class="row justify-content-center text-center">
                                                    @if ($lamaran->status != "Confirmed")
                                                    <button class="btn btn-info m-1" data-toggle="modal"
                                                        data-target="#lamaranEdit{{ $loop->iteration }}">Edit</button>
                                                    @else
                                                    <button class="btn btn-info m-1" data-toggle="modal"
                                                        data-target="#lamaranEdit{{ $loop->iteration }}" disabled>Edit</button>
                                                    @endif
                                                    <button class="btn btn-danger m-1" data-toggle="modal"
                                                        data-target="#lamaranDelete{{ $loop->iteration }}">Delete</button>
                                                </div>
                                            </td>
                                        </tr>

                                        <div class="modal fade" id="viewCv"
                                            tabindex="-1" style="padding-right: 0 !important;" role="dialog"
                                            aria-labelledby="viewCv" aria-hidden="true">
                                            <div class="modal-dialog modal-xl" style="max-height:80%;" role="document">
                                                <div class="modal-content" style="height:600px;">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title"
                                                            id="viewCv">CV 
                                                            {{$profile->email}}</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <iframe src="./files/CV/{{$lamaran->cvName}}" frameborder="0" height="100%" width="100%">
                                                    </iframe>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="modal fade" id="modalStatus"
                                            tabindex="-1" style="padding-right: 0 !important;" role="dialog"
                                            aria-labelledby="modalStatus" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title"
                                                            id="modalStatus">{{ $data_perusahaan->nama }} | {{ $data_lowongan->jabatan }} [{{$lamaran->status}}]</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        @if ($lamaran->status == "Verifying")
                                                        <p>Please wait while we verify your application</p>
                                                        @elseif ($lamaran->status == "Confirmed")
                                                        <p>Congratulations! Your application has been confirmed by {{$data_perusahaan->nama}}.</p>
                                                        <p>Please confirm your identity on the below details.</p>
                                                        @elseif ($lamaran->status == "Declined")
                                                        <p>Sorry, your application has been declined by {{$data_perusahaan->nama}}</p>
                                                        <p>Please check again your CV and the description for {{ $data_perusahaan->nama }} | {{ $data_lowongan->jabatan }}</p>
                                                        @endif
                                                        <hr class="mt-4 mb-2">
                                                        <p class="font-weight-bold">For more information, please contact:</p>
                                                        <p>{{$data_perusahaan->nama}}</p>
                                                        <p>{{$data_perusahaan->lokasi}}</p>
                                                        <p>Phone: {{$data_perusahaan->telepon}}</p>
                                                        <p>{{$data_perusahaan->email}}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="modal fade" id="lamaranEdit{{ $loop->iteration }}" tabindex="-1" style="padding-right: 0 !important;"
                                            role="dialog" aria-labelledby="lamaranEdit{{ $loop->iteration }}"
                                            aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title"
                                                            id="lamaranEdit{{ $loop->iteration }}">
                                                            Edit : {{ $data_perusahaan->nama }} | {{ $data_lowongan->jabatan }}</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="updateLamaran/{{ $lamaran->id }}"
                                                            method="POST" enctype="multipart/form-data">
                                                            @csrf
                                                            <div class="form-group row">
                                                                <label for="uploadCv" class="col-sm-3 col-form-label">Your CV</label>
                                                                <div class="col-sm-9">
                                                                    <input type="file" name="cv_file" accept="application/pdf" class="form-control"
                                                                        style="border: 0" id="uploadCv" required>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <div class="col-sm-3">
                                                                    <button class="btn btn-primary"
                                                                        type="submit">Update</button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="modal fade" id="lamaranDelete{{ $loop->iteration }}"
                                            tabindex="-1" style="padding-right: 0 !important;" role="dialog"
                                            aria-labelledby="lamaranDelete{{ $loop->iteration }}" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title"
                                                            id="lamaranDelete{{ $loop->iteration }}">
                                                            Hapus : {{ $data_perusahaan->nama }} | {{ $data_lowongan->jabatan }}</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="deleteLamaran/{{ $lamaran->id }}"
                                                            method="POST">
                                                            <p>Apakah anda yakin menghapus item
                                                                <b>{{ $data_perusahaan->nama }} | {{ $data_lowongan->jabatan }}</b> ?
                                                            </p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Close</button>
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger">Hapus</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif

    </div>
</div>

{{-- Datatable --}}
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.js">
</script>

{{-- Menu Toggle Script --}}
<script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });

</script>
{{-- Datatable SCRIPT --}}
<script>
    $(document).ready(function() {
        $('#tableLowongan').DataTable();
    });
    $(document).ready(function() {
        $('#tableLamaran').DataTable();
    });

</script>

{{-- --}}
<script type="text/javascript">
    // Restricts input for the set of matched elements to the given inputFilter function.
    (function($) {
        $.fn.inputFilter = function(inputFilter) {
            return this.on("input keydown keyup mousedown mouseup select contextmenu drop", function() {
                if (inputFilter(this.value)) {
                    this.oldValue = this.value;
                    this.oldSelectionStart = this.selectionStart;
                    this.oldSelectionEnd = this.selectionEnd;
                } else if (this.hasOwnProperty("oldValue")) {
                    this.value = this.oldValue;
                    this.setSelectionRange(this.oldSelectionStart, this.oldSelectionEnd);
                } else {
                    this.value = "";
                }
            });
        };
    }(jQuery));

    $("#gajiTB").inputFilter(function(value) {
        return /^\d*$/.test(value);
    });

</script>
<script>
    $("#profile_button").click(function() {
        if ($("#profile").css("display", "none")) {
            $("#profile").show("slow");
            $('#lowongan').hide("fast");
            $('#lamaran').hide("fast");
        }
    });
    $("#lowongan_button").click(function() {
        if ($("#lowongan").css("display", "none")) {
            $('#lowongan').show("slow");
            $("#profile").hide("fast");
            $('#lamaran').hide("fast");
        }
    });
    $("#lamaran_button").click(function() {
        if ($("#lamaran").css("display", "none")) {
            $('#lamaran').show("slow");
            $("#profile").hide("fast");
            $('#lowongan').hide("fast");
        }
    });

</script>
<script>
    var currLoc = window.location.href;
    if (currLoc == "{{ url('/profile#profile') }}") {
        document.getElementById("profile_button").click();
    }
    if (currLoc == "{{ url('/profile#lowongan') }}") {
        document.getElementById("lowongan_button").click();
    }
    if (currLoc == "{{ url('/profile#lamaran') }}") {
        document.getElementById("lamaran_button").click();
    }

</script>

{{-- Sweet Alert --}}
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
@if (session()->has('uploaded'))
    <script>
        $(document).ready(function() {
            swal({
                title: "Successfully uploaded your data!",
                text: "You may check your data",
                type: "success",
                icon: "success"
            });
        });

    </script>
@endif

@if (session()->has('updated'))
    <script>
        $(document).ready(function() {
            swal({
                title: "Successfully updated your data!",
                text: "You may check your data",
                type: "success",
                icon: "success"
            });
        });

    </script>
@endif

@if (session()->has('deleted'))
    <script>
        $(document).ready(function() {
            swal({
                title: "Successfully deleted your data!",
                text: "You may check your data",
                type: "success",
                icon: "success"
            });
        });

    </script>
@endif

@endsection
