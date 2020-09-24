@extends('layouts.base')

@section('content')
    <h1>Déatil de {{$category->name}}</h1>

<form method="post" action='{{route('updateCategory',$category->id)}}'>
        @csrf
        <div class="form-group">
            <label>Nom de la catégorie</label>
            <input type="text" class="form-control" name="name" value="{{$category->name}}" required>
        </div>
        <button type="submit" class="btn btn-primary">Modifier</button>
        @include('components.errors')
    </form>
@endsection