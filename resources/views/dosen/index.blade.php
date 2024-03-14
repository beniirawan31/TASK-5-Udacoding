@extends('layout.main')


@section('konten')

<div class="container mt-5">
    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <div class="pb-3">
            <form class="d-flex" method="get">
                <input class="form-control me-1" type="search" name="katakunci" value="{{ Request::get('katakunci') }}"
                    placeholder="Masukkan kata kunci" aria-label="Search">
                <button class="btn btn-secondary" type="submit">Cari</button>
            </form>
        </div>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th class="col-md-2">No</th>
                    <th class="col-md-2">NIP</th>
                    <th class="col-md-2">Nama</th>
                    <th class="col-md-2">Umur</th>
                    <th class="col-md-2">Jurusan</th>
                    <th class="col-md-2">Alamat</th>


                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>1001</td>
                    <td>Ani</td>
                    <td>30</td>
                    <td>Ilmu Komputer</td>
                    <td>Padang</td>
                </tr>


            </tbody>
        </table>
    </div>
</div>

@endsection
