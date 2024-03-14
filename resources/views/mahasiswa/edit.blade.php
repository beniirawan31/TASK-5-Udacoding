<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Task 5</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

    <!-- Container -->
    <div class="container my-5">

        @include('komponen.pesan')

        <div class="pb-3">
            <a href="{{ url('mahasiswa') }}" class="btn btn-primary">Kembali</a>
        </div>
        <h3>Form Tambah Data</h3>
        <!-- Form -->
       <form action='{{url('mahasiswa/'.$data->nim)}}' method='post'>
        @csrf

        @method('PUT')

            <div class="my-3 p-3 bg-body rounded shadow-sm">

                 <div class="mb-3 row">
                    <label for="nim" class="col-sm-2 col-form-label">NIM</label>
                    <div class="col-sm-10">
                        {{ $data->nim}}
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name='nama' value="{{ $data->nama }}" id="nama">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="jurusan" class="col-sm-2 col-form-label">Jurusan</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name='jurusan'value="{{$data->jurusan}}" id="jurusan">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="alamat" class="col-sm-2 col-form-label">alamat</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name='alamat'value="{{$data->alamat}}" id="alamat">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="kaprodi" class="col-sm-2 col-form-label">kaprodi</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name='kaprodi'value="{{$data->kaprodi}}" id="kaprodi">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="jurusan" class="col-sm-2 col-form-label"></label>
                    <div class="col-sm-10"><button type="submit" class="btn btn-primary" name="submit">SIMPAN</button></div>
                </div>
            </div>
        </form>
        <!-- End Form -->

    </div>
    <!-- End Container -->

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.10.2/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.1/js/bootstrap.min.js"></script>

</body>

</html>
