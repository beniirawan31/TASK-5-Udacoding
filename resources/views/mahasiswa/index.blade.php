@extends('layout.main')

@section('konten')

<div class="container mt-5">
    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <div class="pb-3">

            @include('komponen.pesan')

            <form class="d-flex" method="get">
                <input class="form-control me-1" type="search" name="katakunci" value="{{ Request::get('katakunci') }}"
                    placeholder="Masukkan kata kunci" aria-label="Search">
                <button class="btn btn-secondary" type="submit">Cari</button>
            </form>
        </div>

        <div class="pb-3">
            <a href="{{ url('mahasiswa/create') }}" class="btn btn-primary">+ Tambah Data</a>
        </div>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th class="col-md-1">No</th>
                    <th class="col-md-2">NIM</th>
                    <th class="col-md-2">Nama</th>
                    <th class="col-md-3">Jurusan</th>
                    <th class="col-md-2">Alamat</th>
                    <th class="col-md-2">Kaprodi</th>
                    <th class="col-md-3">Aksi</th>
                </tr>
            </thead>
            <tbody>

                @php
                $offset = ($data->currentPage() - 1) * $data->perPage() + 1;
                @endphp
                @foreach ($data as $item)

                <tr>
                    <td>{{  $offset }}</td>
                    <td>{{ $item->nim }}</td>
                    <td>{{ $item->nama }}</td>
                    <td>{{ $item->jurusan }}</td>
                    <td>{{ $item->alamat }}</td>
                    <td>{{ $item->kaprodi }}</td>
                    <td>
                        <div style="display: flex; flex-direction: row;">
                            <a href='{{url('mahasiswa/'.$item->nim.'/edit') }}' class="btn btn-warning btn-sm"><svg
                                    xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-pencil-square" viewBox="0 0 16 16">
                                    <path
                                        d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                    <path fill-rule="evenodd"
                                        d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z" />
                                </svg></a>


                            <form onsubmit="return confirm('yakin hapus data ?')" class="d-inline"
                                action="{{'mahasiswa/'.$item->nim}}" method="post">

                                @csrf
                                @method('DELETE')

                                <button type="submit" name="submit" class="btn btn-danger btn-sm">Del</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @php
                $offset++;
                @endphp
                @endforeach
            </tbody>
        </table>{{$data->links()}}

    </div>
</div>

@endsection
