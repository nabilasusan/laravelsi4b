<?php

namespace App\Http\Controllers;

use App\Models\Fakultas;
use App\Models\Mahasiswa;
use App\Models\Prodi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Symfony\Contracts\Service\Attribute\Required;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mahasiswa = mahasiswa::all();
        return view('mahasiswa.index')
            ->with('mahasiswa',$mahasiswa);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $prodi = prodi::all(); 
        return view('mahasiswa.create')
        ->with('prodi',$prodi);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // return $request;
        $val = $request->validate([
            'id'=> 'required',
            'npm'=>'required',
            'nama'=>"required|unique:mahasiswas",
            'tempat_lahir'=>'required',
            'tanggal_lahir'=>'required',
            'alamat'=>'required',
            'url_foto' => 'Required|file|mimes:png,jpg|max:10000',
            'prodi_id' => 'required'
        ]);

        // ekstenso file yang di upload
        $ext = $request->url_foto->getClientOriginalExtension();
        
        // rename misal : npm.extense
        $val['url_foto'] = $request->npm.".".$ext;

        // upload ke tabel mahasiswa
        $request->url_foto->move('foto',$val['url_foto']);

        // simpan ke tabel mahasiswa
        Mahasiswa::create($val);

        // redirect ke halaman list fakultas
        return redirect()->route('mahasiswa.index')->with('success',$val['nama'].'berhasil disimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(mahasiswa $mahasiswa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(mahasiswa $mahasiswa)
    {
        // dd($mahasiswa);
        $prodi = prodi::all(); 
        return view('mahasiswa.edit')
        ->with('prodi',$prodi)
        ->with('mahasiswa',$mahasiswa);
    }
    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, mahasiswa $mahasiswa)
    {
        // dd($request);
        if($request->url_foto) {
            $val = $request->validate([
                // 'id'=> 'required',
                // 'npm'=>'required',
                'nama'=>"required|unique:mahasiswas",
                'tempat_lahir'=>'required',
                'tanggal_lahir'=>'required',
                'alamat'=>'required',
                'url_foto' => 'Required|file|mimes:png,jpg|max:10000',
                'prodi_id' => 'required'
            ]);
    
        } else {
            $val = $request->validate([
                // 'id'=> 'required',
                // 'npm'=>'required',
                'nama'=>"required|unique:mahasiswas",
                'tempat_lahir'=>'required',
                'tanggal_lahir'=>'required',
                'alamat'=>'required',
                // 'url_foto' => 'Required|file|mimes:png,jpg|max:10000',
                'prodi_id' => 'required'
            ]);
            // ekstenso file yang di upload
        $ext = $request->url_foto->getClientOriginalExtension();
        
        // rename misal : npm.extense
        $val['url_foto'] = $request->npm.".".$ext;

        // upload ke tabel mahasiswa
        $request->url_foto->move('foto',$val['url_foto']);
    
        }

        // simpan ke tabel mahasiswa
        Mahasiswa::where('id',$mahasiswa['id'])->update($val);

        // redirect ke halaman list fakultas
        return redirect()->route('mahasiswa.index')->with('success',$val['nama'].'berhasil disimpan');
    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(mahasiswa $mahasiswa)
    {
        // dd($mahasiswa);
        File::delete('foto/'. $mahasiswa['url_foto']);
        $mahasiswa->delete();
        return redirect()->route('mahasiswa.index')->with('success','data berhasil dihapus.');
    }
}