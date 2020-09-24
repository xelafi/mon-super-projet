@extends('layouts.base')

@section('title') Accueil @endsection

@section('content')
    <h1>Mon super blog</h1>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam laudantium, minima consequatur saepe, atque accusantium debitis nihil at totam dolorum fuga omnis facilis itaque deserunt aspernatur labore odit fugiat iste.</p>

    <div class="row">
        @foreach ($posts as $post)
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{$post->name}}</h5>
                        <h6>@if ($post->category !== null) {{$post->category->name}}@else <br> @endif</h6>
                        <p class="card-text">{{$post->description}}</p>
                        <p>Ecrit le {{$post->created_at->format(('d/m/Y'))}} à {{$post->created_at->format(('H:m'))}} 
                            par {{$post->user->id === Auth::id() ? 'Moi' : $post->user->name}}</p>
                        <a href="{{route('detailsPost', $post->slug)}}" class="btn btn-primary">En savoir plus</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    @endsection
