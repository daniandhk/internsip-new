@extends('header')
@section('title', 'Home')
@section('content')

    <div class="homepage">
        <div class="container p-4 mt-4">
            <div class="col-xl-6 col-md-8 col-sm-12 mt-4 p-4" style="background-color: #E5E5E5">
                <form action="searchLowongan" method="POST" enctype="multipart/form-data">
                @csrf    
                    <div class="form-group">
                        <h4 class="font-weight-bold ml-2 mr-2">Nama Pekerjaan</h4>
                        <div class="md-form mb-4 ml-2 mr-2">
                            <input name="jabatan" type="text" id="orangeForm-name" placeholder="..." class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <h4 class="font-weight-bold ml-2 mr-2">Wilayah</h4>
                        <div class="md-form mb-4 ml-2 mr-2 row">
                            <select class="select form-control col-sm-4" name="jenis_wilayah" id="jenis_wilayah">
                                <option selected="jenis_wilayah" value="Kota">
                                    Kota
                                </option>
                                <option selected="jenis_wilayah" value="Kabupaten">
                                    Kabupaten
                                </option>
                            </select>
                            <input name="nama_wilayah" type="text" id="orangeForm-name" placeholder="..." class="form-control col-sm-8" required>
                        </div>
                    </div>
                    <div class="form-group ml-2 mr-2">
                        <button class="btn btn-primary" type="submit"> Cari Lowongan! </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
