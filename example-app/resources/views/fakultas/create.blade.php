@extends('layout.main')

@section('title','Fakultas')

@section('konten')
<div class="row">
    {{-- formulirtambah fakultas --}}
    <div class="col-md-6 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Tambah Fakultas</h4>
            <p class="card-description">
              Formulir tambah fakultas
            </p>
            <form method="POST" action="{{ route('fakultas.store')}}" class ="forms-sample">
            @csrf
              <div class="form-group">
                <label for="nama">Nama Fakultas</label>
                <input type="text" class="form-control" name="nama" placeholder="Nama fakultas">
              </div>
              <div class="form-group">
                <label for="Singkat">Singkatan</label>
                <input type="text" class="form-control" name="singkatan" placeholder="FIKR,FEB,...">
              </div>
              <button type="submit" class="btn btn-primary mr-2">Submit</button>
              <a href="{{ url('fakultas')}}" class="btn btn-light">Batal</a>
            </form>
          </div>
        </div>
      </div>
</div>
@endsection