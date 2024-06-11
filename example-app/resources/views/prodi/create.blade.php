@extends('layout.main')

@section('title','Prodi')

@section('konten')
<div class="row">
    {{-- formulirtambah fakultas --}}
    <div class="col-md-6 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Tambah Prodi</h4>
            <p class="card-description">
              Formulir tambah prodi
            </p>
            <form method="POST" action="{{ route('prodi.store')}}" class ="forms-sample">
            @csrf
              <div class="form-group">
                <label for="nama">Nama Program Studi</label>
                <input type="text" class="form-control" name="nama" placeholder="Nama prodi">
              </div>
              <div class="form-group">
                <label for="Singkat">Singkatan</label>
                <input type="text" class="form-control" name="singkatan" placeholder="FIKR,FIB,...">
              </div>
              <div class="form-group">
                <label for="fakultas_id">Fakultas</label>
                <select name="fakultas_id" class="form-control">
                    @foreach ($fakultas as $item)
                        <option value="{{$item['id']}}">
                            {{$item['nama']}}
                        </option>
                    @endforeach
                </select>
                @error('fakultas_id')
                    <span class="text-danger">
                        {{$message}}
                    </span>
                @enderror
              </div>
              <button type="submit" class="btn btn-primary mr-2">Submit</button>
              <a href="{{ url('prodi')}}" class="btn btn-light">Batal</a>
            </form>
          </div>
        </div>
      </div>
</div>
@endsection