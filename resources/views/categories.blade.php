@extends('layouts.base')

@section('content')

    <h1>Catégories</h1>
    <p>cette section permet de voir la liste des catégories.</p>
    <table class="table mt-5">
        <thead>
            <tr>
                <td>#</td>
                <td>Name</td>
                <td>Actions</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
                <tr>
                <td>{{$category->id}}</td>
                <td>{{$category->name}}</td>
                <td>
                <a href="{{route('detailsCategory',$category->id)}}" class="btn btn-warning">Modifier</a> 
                <form class="d-inline" method="post" action="{{route('deleteCategory',$category->id)}}">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-danger">Supprimer</button>
                </form>
                </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <form method="post" action="{{route('storeCategory')}}">
        @csrf
        <div class="form-group">
            <label>Catégorie</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Ajouter</button>

        @include('components.errors')

    </form>
    
@endsection