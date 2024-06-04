<<<<<<< HEAD
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>UMDP</h1>
<h2>program studi</h2>
<ul>
@foreach ($prodi as $item)
<li>{{ $item["nama"] }} {{ $item["singkatan"] }}
{{ $item["fakultas"] ["nama"] }} </li>
@endforeach
</ul>
</body>
</html>
=======
@extends('layout.main')

@section('title','Fakultas')

@section('content')

    <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Basic Table</h4>
                  <p class="card-description">
                    list data fakultas
                  </p>
                  <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                          <th>nama fakultas</th>
                          <th>singkatan</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($fakultas as $item)
                         <tr>
                            <td>{{ $item["nama"] }}</td>
                            <td>{{ $item["singkatan"] }}</td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
@endsection

>>>>>>> d16e9f7cefb03ff078ca473a412db2f4cc5a9398
