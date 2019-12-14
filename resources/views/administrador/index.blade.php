@extends('layouts.app')


@section('header')
    @include('layouts.header')
@endsection

@section('nav')
    @include('layouts.nav')
@endsection

@section('content')
<div class="container">
	<div class="text-center">
		<h1 class="mb-5">Área do Administrador</h1>
	</div>
	<div class="row">
		<div class="col-3 text-center mb-5">
			<a href={{ route('administrador.professores') }} class="btn btn-primary btn-lg active" role="button" aria-pressed="true">
				<p>Gerenciar Professores</p>
			</a>
		</div>
		<div class="col-3 text-center">
			<a href="{{ route('administrador.alunos') }}" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">
						<p>Gerenciar Alunos</p>
			</a>
		</div>
		<div class="col-3 text-center">
			<a href="{{ route('administrador.projetos') }}" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">
				<p>Gerenciar Projetos</p>
			</a>
			
		</div>
		<div class="col-3 text-center">
			<a href="{{ route('administrador.editais') }}" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">
				<p>Gerenciar Editais</p>
			</a>
		</div>
	</div>
</div>
@endsection


@section('footer')
    @include('layouts.footer')
@endsection