<?php

namespace App\Http\Controllers;

use App\Models\mahasiswa;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class mahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $katakunci = $request->input('katakunci');
        $jumlahbaris = 4;
        if (strlen($katakunci)) {
            $data = Mahasiswa::where('nim', 'like', "%$katakunci%")
                ->orWhere('nama', 'like', "%$katakunci%")
                ->orWhere('jurusan', 'like', "%$katakunci%")
                ->paginate($jumlahbaris);
        } else {
            $data = Mahasiswa::orderBy('nim', 'desc')->paginate($jumlahbaris);
        }
        return view('mahasiswa.index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data   = mahasiswa::orderBy('nim', 'desc')->get();

        return view('mahasiswa.create')->with('data', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)

    {

        Session::flash('nim', $request->nim);
        Session::flash('nama', $request->nama);
        Session::flash('jurusan', $request->jurusan);
        Session::flash('alamat', $request->alamat);
        Session::flash('kaprodi', $request->kaprodi);

        $request->validate([
            'nim' => 'required|numeric|unique:mahasiswa,nim',
            'nama' => 'required',
            'jurusan' => 'required',
            'alamat' => 'required',
            'kaprodi' => 'required',
        ], [
            'nim.required' => 'Nim Wajib diisi',
            'nim.numeric' => 'Nim Wajib angka',
            'nim.unique' => 'Nim sudah ada di database',
            'nama.required' => 'nama Wajib diisi',
            'jurusan.required' => 'jurusan Wajib diisi',
            'alamat.required' => 'alamat Wajib diisi',
            'kaprodi.required' => 'kaprodi Wajib diisi',
        ]);


        $data = [
            'nim' => $request->nim,
            'nama' => $request->nama,
            'jurusan' => $request->jurusan,
            'alamat' => $request->alamat,
            'kaprodi' => $request->kaprodi,
        ];

        mahasiswa::create($data);
        return redirect()->to('mahasiswa')->with('success', 'Berhasil menambahkan Data');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = mahasiswa::where('nim', $id)->first();

        return view('mahasiswa.edit')->with('data', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama' => 'required',
            'jurusan' => 'required',
            'alamat' => 'required',
            'kaprodi' => 'required',
        ], [
            'nama.required' => 'Nama Wajib Di isi',
            'jurusan.required' => 'Jurusan Wajib Di isi',
            'alamat.required' => 'alamat Wajib Di isi',
            'kaprodi.required' => 'kaprodi Wajib Di isi'
        ]);

        $data = [
            'nama' => $request->nama,
            'jurusan' => $request->jurusan,
            'alamat' => $request->alamat,
            'kaprodi' => $request->kaprodi,
        ];

        mahasiswa::where('nim', $id)->update($data);
        return redirect()->to('mahasiswa')->with('success', 'Berhasil Edit data');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    { {
            mahasiswa::where('nim', $id)->delete();

            return redirect()->to('mahasiswa')->with('success', 'Berhasil Hapus Data');
        }
    }
}
