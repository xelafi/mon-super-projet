<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item ">
        <a class="nav-link" href="{{route('home')}}">Accueil <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route('posts')}}">Articles</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('categories')}}">Catégories</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Auteurs</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('contact')}}">Contact</a>
          </li>  
              
      </ul>
      <ul  class="navbar-nav">
        @if (Auth::check())

        <li class="nav-item">
          <a class="nav-link" href="#">{{Auth::user()->name}}</a>
        </li>

        <li class="nav-item">
        <a class="nav-link" href="{{route('logout')}}">Déconnexion</a>
        </li>
            
        @else
              
          <li class="nav-item">
            <a class="nav-link" href="{{route('login')}}">Connexion</a>
          </li>

            <li class="nav-item">
              <a class="nav-link" href="{{route('register')}}">Insciprion</a>
            </li>
          
        @endif
      </ul>
      
    </div>
  </nav>