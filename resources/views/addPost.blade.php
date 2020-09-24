@extends('layouts.base')

@section('content')
<h1>Aouter un post</h1>

<form class="mt-5" method="post" action="{{route('storePost')}}" enctype="multipart/form-data">
    @csrf
    <div class="form-group">

        <label>Name</label>
        <input type="text" name="name" class="form-control" required>

        <label>Description</label>
        <input type="text" name="description" class="form-control" required>

        <label>Content</label>
        <textarea name="content" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
        
        <label>Categorie</label>
        <select class="form-control form-control-lg" name="category_id">
            @foreach ($categories as $category)
                <option value="{{$category->id}}">{{$category->name}}</option>
            @endforeach
            
        </select>

        <label>Image</label>
        <input type="file" name="image" required class="form-control-file" accept="image/png">
    </div>
    <button type="submit" class="btn btn-primary">Ajouter</button>

    @include('components.errors')

</form>
@endsection