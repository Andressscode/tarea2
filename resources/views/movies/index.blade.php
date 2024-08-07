
@extends('layouts.app')
@section('content')
<div style="display: flex; flex-direction: column"><Div style=""><h1>Películas por género</h1></Div>
    
    <ul style="display: flex; flex-direction: column; gap: 10px">
        @foreach($categories as $category)
            <li style="list-style-type: none"><a href="{{ route('movies.genero', $category->name) }}">{{ $category->name }}</a></li>
        @endforeach
    </ul></div>

    @endsection

