@extends('layouts.base')

@section('content')
<h1>Modification de l'aticle "{{$post->name}}"</h1>

<form class="mt-5" method="post" action="{{route('updatePost',$post->id)}}" enctype="multipart/form-data">
    @csrf
    
    <div class="form-group">
        <label>Name</label>
        <input type="text" name="name" class="form-control" value="{{$post->name}}" required>
    </div>

    <div class="form-group">
        <label>Description</label>
        <input type="text" name="description" class="form-control" value="{{$post->description}}" required>
    </div>

    <div class="form-group">
        <label>Content</label>
        <textarea name="content"  class="form-control" id="exampleFormControlTextarea1" rows="3">{{$post->content}}</textarea>
    </div>

    <div class="form-group">
        <label>Categorie</label>
        <select class="form-control form-control-lg" name="category_id">
            @foreach ($categories as $category)
                <option @if ($category->id === $post->category_id)
                    selected
                @endif value="{{$category->id}}">{{$category->name}}</option>
            @endforeach
            
        </select>
    </div>

    <div class="form-group">
        <label>Image</label>
        <input type="file" name="image" class="form-control-file" accept="image/png">
    </div>

    <button type="submit" class="btn btn-primary">Modifier</button>

    @include('components.errors')

</form>
@endsection