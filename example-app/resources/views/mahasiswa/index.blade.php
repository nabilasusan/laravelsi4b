@extends('layout.main')

@section('title','mahasiswa')

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
                  <h4 class="card-title">mahasiswa</h4>
                  <p class="card-description">
                    Add class <code>list data mahasiswa</code>
                  </p>
                  <a href="{{route('mahasiswa.create')}}" class="btn btn-rounded btn-primary">Tambah</a>
                  <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                          <th>id</th>
                          <th>npm</th>
                          <th>nama mahasiswa</th>
                          <th>tempat lahir</th>
                          <th>tanggal lahir</th>
                          <th>alamat</th>
                          <th>prodi id</th>
                          <th>url foto</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($mahasiswa as $item)
                        <tr>
                            <td>{{$item ["id"]}}</td>
                            <td>{{$item["npm"]}}</td>
                            <td>{{$item["nama"]}}</td>
                            <td>{{$item["tempat_lahir"]}}</td>
                            <td>{{$item["tanggal_lahir"]}}</td>
                            <td>{{$item["alamat"]}}</td>
                            <td>{{$item["prodi_id"]}}</td>
                            <td><img src="{{url('foto/'. $item["url_foto"]) }}"></td>
                            <td>{{$item["url_foto"]}}</td>
                            <td>
                              <form action="{{route('mahasiswa.destroy',$item['id'])}}" method="post">
                                @method('DELETE')
                                @csrf
                                <button type="sumbit" class="btn btn-sm btn-rounded btn-danger show_confirm" data-name="{{$item["nama"]}}">Hapus</button>
                                <a href="{{route('mahasiswa.edit',$item["id"])}}" class="btn btn-sm btn-rounded btn-warning">ubah</a>
                              </form>
                              </td>
                        </tr>
                         @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            @if(session('success'))
            
            <script>
                Swal.fire({
                  title: "yakin",
                  text: "{{session('success') }}",
                  icon: "success"
                });
            </script>
          @endif
          {{-- confirm dialog --}}
          <script type="text/javascript">
           
            $('.show_confirm').click(function(event) {
                 var form =  $(this).closest("form");
                 var name = $(this).data("name");
                 event.preventDefault();
                 Swal.fire({
                  title: "yakin mau dihapus?",
                  text: "setelah dihapus data tidak bisa dikembalikan",
                  icon: "warning",
                  showCancelButton: true,
                  confirmButtonColor: "#3085d6",
                  cancelButtonColor: "#d33",
                  confirmButtonText: "ya, hapus!"
                })
                .then((result) => {
                if (result.isConfirmed) {
                Swal.fire({
                  title: "Deleted!",
                  text: "Your file has been deleted.",
                  icon: ""
                });
                }
                });
                 .then((willDelete) => {
                   if (willDelete.isConfirmed) {
                     form.submit();
                   }
                 });
             });
         
       </script>
@endsection