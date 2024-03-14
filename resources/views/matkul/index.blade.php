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
                    <th class="col-md-">Senin</th>
                    <th class="col-md-2">Selasa</th>
                    <th class="col-md-2">Rabu</th>
                    <th class="col-md-2">Kamis</th>
                    <th class="col-md-2">Jum 'at</th>


                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Pai</td>
                    <td>Web</td>
                    <td>Database</td>
                    <td>Ilmu Komputer</td>
                    <td>Desain</td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Database</td>
                    <td>Ilmu Komputer</td>
                    <td>Desain</td>
                    <td>Pai</td>
                    <td>Web</td>
                </tr>

            </tbody>
        </table>
    </div>
</div>

@endsection
