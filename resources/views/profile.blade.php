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
            @if ($data->imageName != null)
                <img src="{{url('/images/Avatar').'/'.$data->imageName}}" style="padding-top: 8%; height:100%; width:auto; max-height:280px">
            @else
                <img src="{{ url('/images/default-ava.png') }}" style="padding-top: 8%; height:100%; width:auto; max-height:280px">
            @endif
            <div class="container pt-4 pb-4">
                <div class="container">
                    <div class="col-md-8 col-sm-12">
                        <form action="updateProfile/{{$data->id}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                @if (session('role') == 'Perusahaan')
                                <label for="nama" class="col-sm-3 col-form-label">Nama Perusahaan</label>
                                @elseif (session('role') == 'User')
                                <label for="nama" class="col-sm-3 col-form-label">Nama Lengkap</label>
                                @endif
                                <div class="col-sm-9">
                                    <input type="text" name="nama" class="form-control" id="nama" required
                                        style="color: #000000;" value="{{$data->nama}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="telepon" class="col-sm-3 col-form-label">No. Telepon</label>
                                <div class="col-sm-9">
                                    <input type="text" name="telepon" class="form-control" id="telepon"
                                        required style="color: #000000;" value="{{$data->telepon}}">
                                </div>
                            </div>
                            @if (session('role') == 'Perusahaan')
                            <div class="form-group row">
                                <label for="lokasi" class="col-sm-3 col-form-label">Lokasi Pusat</label>
                                <div class="col-sm-9">
                                    <input type="text" name="lokasi" class="form-control" id="lokasi" required
                                        style="color: #000000;" value="{{$data->lokasi}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="deskripsi" class="col-sm-3 col-form-label">Deskripsi</label>
                                <div class="col-sm-9">
                                    <textarea style="color: #000000;"
                                        name="deskripsi" class="form-control" id="deskripsi" rows="3"
                                        required>{{$data->deskripsi}}</textarea>
                                </div>
                            </div>
                            @elseif (session('role') == 'User')
                            <div class="form-group row">
                                <label for="ttl" class="col-sm-3 col-form-label">Tempat, Tanggal Lahir</label>
                                <div class="col-sm-9">
                                    <input type="text" name="ttl" class="form-control" id="ttl" required
                                        style="color: #000000;" value="{{$data->ttl}}">
                                </div>
                            </div>
                            @endif
                            <div class="form-group row">
                                <label for="email" class="col-sm-3 col-form-label">Email</label>
                                <div class="col-sm-9">
                                    <input type="email" name="email" class="form-control" id="email"
                                        style="color: #000000;" value="{{$data->email}}">
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
                                        <input name="nama_wilayah" type="text" id="nama_wilayah" placeholder="..." class="form-control col-sm-8" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="alamat" class="col-sm-3 col-form-label">Alamat</label>
                                    <div class="col-sm-9 row">
                                        <textarea style="color: #000000; resize: none; font-size: 13px;"
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
                                        <input type="number" name="gaji" min="0" class="form-control" id="gaji" required
                                            style="color: #000000;" value="0">
                                    </div>
                                    <label class="col-sm-2 col-form-label">/ Bulan</label>
                                </div>
                                <div class="form-group row">
                                    <label for="deskripsi" class="col-sm-3 col-form-label">Deskripsi</label>
                                    <div class="col-sm-9 row">
                                        <textarea style="color: #000000; font-size: 13px;"
                                            name="deskripsi" class="form-control" id="deskripsi" rows="3"
                                            required></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-3">
                                        <button class="btn btn-primary" type="submit">Tambah Lowongan</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-12">
                            <table id="tableLowongan" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Nama Perusahaan</th>
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
                                    @foreach ($lowongan as $lowongan)
                                    @if ($lowongan->id_perusahaan == $data->id)
                                        <tr>
                                            <th scope="row">{{ $loop->iteration }}</th>
                                            <td>{{ $lowongan->nama_perusahaan }}</td>
                                            <td>{{ $lowongan->jabatan }}</td>
                                            <td>{{ $lowongan->kota }}</td>
                                            <td>{{ $lowongan->alamat }}</td>
                                            <td>{{ $lowongan->durasi }} Bulan</td>
                                            <td>Rp.{{ $lowongan->gaji }} / Bulan</td>
                                            <td>{{ Str::limit($lowongan->deskripsi, 120) }}</td>
                                            <td><button class="btn btn-info" data-toggle="modal"
                                                    data-target="#lowonganEdit{{ $loop->iteration }}">Edit</button>
                                                <button class="btn btn-danger" data-toggle="modal"
                                                    data-target="#lowonganDelete{{ $loop->iteration }}">Delete</button>
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
                                                            Edit : {{ $lowongan->jabatan }}</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="updateLowongan/{{ $lowongan->id }}"
                                                            method="POST" enctype="multipart/form-data">
                                                            @csrf
                                                            <div class="form-group row">
                                                                <label for="jabatan" class="col-sm-3 col-form-label">Posisi Internship</label>
                                                                <div class="col-sm-9 row">
                                                                    <input type="text" name="jabatan" value="{{ $lowongan->jabatan }}" class="form-control" id="jabatan" required
                                                                        style="color: #000000;">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="nama_artis_textbox" class="col-sm-3 col-form-label">Kota/Kabupaten</label>
                                                                <div class="col-sm-9 row">
                                                                    <input name="nama_wilayah" type="text" id="nama_wilayah" value="{{ $lowongan->kota }}" placeholder="..." class="form-control" required>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="alamat" class="col-sm-3 col-form-label">Alamat</label>
                                                                <div class="col-sm-9 row">
                                                                    <textarea style="color: #000000; resize: none; font-size: 13px;"
                                                                        name="alamat" class="form-control" id="alamat" rows="3"
                                                                        required>{{ $lowongan->alamat }}</textarea>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="durasi" class="col-sm-3 col-form-label">Durasi</label>
                                                                <div class="col-sm-3">
                                                                    <input type="number" name="durasi" value="{{ $lowongan->durasi }}" min="0" class="form-control" id="durasi" required
                                                                        style="color: #000000;">
                                                                </div>
                                                                <label class="col-sm-6 col-form-label">Bulan</label>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="gaji" class="col-sm-3 col-form-label">Gaji</label>
                                                                <label class="col-sm-1 col-form-label">Rp.</label>
                                                                <div class="col-sm-6">
                                                                    <input type="number" name="gaji" min="0" value="{{ $lowongan->gaji }}" class="form-control" id="gaji" required
                                                                        style="color: #000000;" value="0">
                                                                </div>
                                                                <label class="col-sm-2 col-form-label">/ Bulan</label>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="deskripsi" class="col-sm-3 col-form-label">Deskripsi</label>
                                                                <div class="col-sm-9 row">
                                                                    <textarea style="color: #000000; font-size: 13px;"
                                                                        name="deskripsi" class="form-control" id="deskripsi" rows="3"
                                                                        required>{{ $lowongan->deskripsi }}</textarea>
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
                                                            Hapus : {{ $lowongan->jabatan }}</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="deleteLowongan/{{ $lowongan->id }}"
                                                            method="POST">
                                                            <p>Apakah anda yakin menghapus item
                                                                <b>{{ $lowongan->jabatan }}</b> ?
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

</script>

{{-- --}}
<script>
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

    $("#gaji").inputFilter(function(value) {
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

@endsection
