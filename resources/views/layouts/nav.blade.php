@section('nav')
<nav class="navbar navbar-expand-lg mb-5" style="background-color: #4681b4;">
        <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item mx-3">
            <a style="color: white;" class="nav-link" href="{{route("home")}}">Inicio</a>
          </li>
    
          <li class="nav-item dropdown mx-3">
            <a class="nav-link dropdown-toggle" style="color: white;"  href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Pessoas
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item"  href="{{route("professores.index")}}">Professores</a>
              <a class="dropdown-item"  href="{{route("alunos.nao-egressos")}}">Alunos</a>
              <a class="dropdown-item" href="{{route("alunos.egressos")}}">Egressos</a>
            </div>
          </li>
          <li class="nav-item dropdown mx-3">
            <a class="nav-link dropdown-toggle" style="color: white;" href="{{route("projetos.index")}}" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Projetos
            </a>
            <div class="dropdown-menu " aria-labelledby="navbarDropdown">
              <a class="dropdown-item "  href="{{route("projetos.nao-finalizados")}}">Em andamento</a>
              <a class="dropdown-item " href="{{route("projetos.finalizados")}}">Finalizados</a>
    
            </div>
          </li>
          <li class="nav-item mx-3">
            <a class="nav-link texto-branco" style="color: white;" href="{{route('editais.index')}}">Editais</a>
          </li>

          <li class="nav-item mx-3">
            <a class="nav-link texto-branco"style="color: white;"  href="{{route("contato.index")}}">Contato</a>
          </li>

          {{-- @if (auth()->user() != null)
          <li class="nav-item mx-3">
            <a class="nav-link texto-branco" style="color: white;" href="{{route('editais.index')}}">Área do Administrador</a>
          </li>              
          @endif --}}

          @auth
            <li class="nav-item mx-3">
              <a class="nav-link texto-branco" style="color: white;" href="{{route('administrador.index')}}">Área do Administrador</a>
            </li>    
          @endauth
          

        </ul>
      </div>
        </nav>
@endsection