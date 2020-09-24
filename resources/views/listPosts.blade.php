@extends('layouts.base')

@section('title') Posts @endsection

@section('content')
    <h1>Liste des articles</h1>
    @if (Auth::check())
    <a class="btn btn-primary mt-3" href="{{route('addPost')}}"> 
        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-plus" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
          </svg>
        Ajouter un article
    </a>
    @endif
   
    
    <div class="row mt-4">
        @foreach ($posts as $post)
            <div class="col-md-4">
            
                <div class="card mt-4">
                    @if ($post->image)
                        <img src="{{asset('storage/' . $post->image)}}" height="300" alt="">
                    @else
                    <img src="https://sciences.ucf.edu/psychology/wp-content/uploads/sites/63/2019/09/No-Image-Available.png" height="300" alt="">
                    @endif
                    
                    <div class="card-body">
                        <h5 class="card-title">{{$post->name}}</h5>
                        <h6>@if ($post->category !== null) {{$post->category->name}}@else Pas de Catégorie @endif</h6>
                        <p class="card-text">{{$post->description}}</p>
                        <p class="card-text d-inline">Modifier le : {{$post->created_at->format('d/m/Y')}} à {{$post->updated_at->format('H:m')}}</p>
                        <p class="font-italic blockquote-footer">Crée le : {{$post->created_at->format('d/m/Y')}} à {{$post->created_at->format('H:m')}}</p>
                        <a href="{{route('detailsPost', $post->slug)}}" class="btn btn-primary">
                            En savoir plus
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-chat-left-text" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M14 1H2a1 1 0 0 0-1 1v11.586l2-2A2 2 0 0 1 4.414 11H14a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1zM2 0a2 2 0 0 0-2 2v12.793a.5.5 0 0 0 .854.353l2.853-2.853A1 1 0 0 1 4.414 12H14a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                                <path fill-rule="evenodd" d="M3 3.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zM3 6a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9A.5.5 0 0 1 3 6zm0 2.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5z"/>
                            </svg>
                        </a>
                        <br>
                        <div class="mt-2">
                            @if (Auth::check() && $post->user->id === Auth::id())
                                <a href="{{route('changePost',$post->id)}}" class="btn btn-warning">
                                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-gear-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M9.405 1.05c-.413-1.4-2.397-1.4-2.81 0l-.1.34a1.464 1.464 0 0 1-2.105.872l-.31-.17c-1.283-.698-2.686.705-1.987 1.987l.169.311c.446.82.023 1.841-.872 2.105l-.34.1c-1.4.413-1.4 2.397 0 2.81l.34.1a1.464 1.464 0 0 1 .872 2.105l-.17.31c-.698 1.283.705 2.686 1.987 1.987l.311-.169a1.464 1.464 0 0 1 2.105.872l.1.34c.413 1.4 2.397 1.4 2.81 0l.1-.34a1.464 1.464 0 0 1 2.105-.872l.31.17c1.283.698 2.686-.705 1.987-1.987l-.169-.311a1.464 1.464 0 0 1 .872-2.105l.34-.1c1.4-.413 1.4-2.397 0-2.81l-.34-.1a1.464 1.464 0 0 1-.872-2.105l.17-.31c.698-1.283-.705-2.686-1.987-1.987l-.311.169a1.464 1.464 0 0 1-2.105-.872l-.1-.34zM8 10.93a2.929 2.929 0 1 0 0-5.86 2.929 2.929 0 0 0 0 5.858z"/>
                                    </svg>
                                    Modifier
                                </a> 
                            
                                <form class="mt-2 d-inline" method="post" action="{{route('deletePost',$post->id)}}">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger">
                                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-x" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                                        </svg>
                                        Supprimer
                                    </button>
                                </form>
                            @endif
                        </div>
                        
                    </div>
                </div>
            </div>

        @endforeach
    </div>

        @endsection
