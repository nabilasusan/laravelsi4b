@extends('layout.main')

@section('title','prodi')

@section('konten')
    {{-- <h1>UMDP</h1>
    <h2>prodi</h2>
    <ul>
    @foreach ($prodi as $item)
        <li>{{$item ["nama"]}}{{$item["singkatan"]}}</li>
    @endforeach --}}
    </ul>
    <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Prodi</h4>
                  <p class="card-description">
                    Add class <code>list data Prodi</code>
                  </p>
                  <a href="{{route('prodi.create')}}" class="btn btn-rounded btn-primary">Tambah</a>
                  <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                          <th>NAma Prodi</th>
                          <th>Singkatan</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($prodi as $item)
                        <tr>
                            <td>{{$item ["nama"]}}</td>
                            <td>{{$item["singkatan"]}}</td>
                        </tr>
                         @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            @if(session('success'))
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            <script>
                Swal.fire({
                  title: "Good job!",
                  text: "{{session('success') }}",
                  icon: "success"
                });
            </script>
          @endif
@endsection
