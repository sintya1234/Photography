

@extends('layouts.main')
@section('container')
<link rel="stylesheet" href="css/style.css">
    <h1>Halaman about</h1>
    <h3>{{ $name }}</h3>
    <p>{{ $email }}</p>
    <img src="img/{{ $img }}" alt="{{ $name }}" height="500" class="img-thumbnail rounded-circle">
@endsection