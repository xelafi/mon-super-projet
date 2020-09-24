@extends('layouts.base')

@section('content')

    <div>
    <h1>{{$post->name}}</h1>
    <h2>{{$post->category->name}}</h2>
        <p>{{$post->content}}</p>
    <p>Ecrit le : {{$post->created_at->format('d/m/Y')}} à {{$post->created_at->format('H:m')}}</p>

    </div>
@endsection