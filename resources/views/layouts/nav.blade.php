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
              <a class="dropdown-item"  href="professores.php">Professores</a>
              <a class="dropdown-item"  href="{{route("aluno.nao-egressos")}}">Alunos</a>
              <a class="dropdown-item" href="{{route("aluno.egressos")}}">Egressos</a>
            </div>
          </li>
          <li class="nav-item dropdown mx-3">
            <a class="nav-link dropdown-toggle" style="color: white;" href="{{route("projeto.index")}}" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Projetos
            </a>
            <div class="dropdown-menu " aria-labelledby="navbarDropdown">
              <a class="dropdown-item "  href="{{route("projeto.nao-finalizados")}}">Em andamento</a>
              <a class="dropdown-item " href="{{route("projeto.finalizados")}}">Finalizados</a>
    
            </div>
          </li>
          <li class="nav-item mx-3">
            <a class="nav-link texto-branco" style="color: white;" href="editais.php">Editais</a>
          </li>
          <li class="nav-item mx-3">
          <a class="nav-link texto-branco"style="color: white;"  href="{{route("contato.index")}}">Contato</a>
          </li>
        </ul>
      </div>
        </nav>
@endsection