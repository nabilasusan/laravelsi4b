<h1>Program Studi</h1>
<ul>
@foreach ($viewlist as $item)
    {{ $item }}</li>
@endforeach
<ul>

<h1>Mahasiswa</h1>
<ul>
    @foreach ($viewmhs as $item)
        <li>{{ $item["npm"]}} - {{ $item ["nama"]}} </li>
    @endforeach

</ul>