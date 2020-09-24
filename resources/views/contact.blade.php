@extends('layouts.base')

@section('content')
    <h1>Contact</h1>
    <p>Formulaire de contact</p>

    <form id="form-contact">
        @csrf
        <div class="form-group">
            <label>Nom et prénom</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" class="form-control" required>
        </div>

        <div class="form-group">
            <label>Message</label>
            <textarea name="message" class="form-control" rows="5" required></textarea>
        </div>

        <button type="submit" id="btn-contact" class="btn btn-primary">Envoyer le message</button>
    </form>
    <script src="{{asset('js/contact.js')}}"></script>
@endsection