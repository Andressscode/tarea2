@extends('layouts.app');
@section('content')
    <h1>Lista por género: {{ $genero }}</h1>
    <a href="{{ url('/') }}">Volver</a>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Título</th>
                <th scope="col">Año</th>
                <th scope="col">Estudio</th>
            </tr>
        </thead>
        <tbody>
            @foreach($movies as $movie)
                <tr scope="row">
                    <td>{{ $movie->title }}</td>
                    <td>{{ $movie->year }}</td>
                    <td>{{ $movie->studio }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection