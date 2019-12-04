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
		<h1 class="">Área do Administrador</h1>
	</div>
	<div class="row">
		<div class="col-lg-3 col-md-4 col-sm-12 col-xs-12 Services-tab  item">
			<a href={{ route('administrador.professores') }}>
				<div class="folded-corner service_tab_1">
					<div class="text">
						<i class="fas fa-users-cog fa-5x fa-icon-image"></i>
						<h3>Gerenciar Professores</h3>
						<p>
							Adicionar, Editar e Remover Professores
						</p>
					</div>
				</div>
			</a>
		</div>
		<div class="col-lg-3 col-md-4 col-sm-12 col-xs-12 Services-tab item">
			<a href="{{ route('administrador.alunos') }}">
				<div class="folded-corner service_tab_1">
					<div class="text">
						<i class="fas fa-tasks fa-5x fa-icon-image"></i>
						<h3>Gerenciar Alunos</h3>
						<p>
							Adicionar, Editar e Remover Alunos
						</p>
					</div>
				</div>
			</a>
		</div>
		<div class="col-lg-3 col-md-4 col-sm-12 col-xs-12 Services-tab item">
			<a href="{{ route('administrador.projetos') }}">
				<div class="folded-corner service_tab_1">
					<div class="text">
						<i class="fas fa-newspaper fa-5x fa-icon-image"></i>
						<h3>Gerenciar Projetos</h3>
						<p>
							Adicionar, Editar e Remover Projetos
						</p>
					</div>
				</div>
			</a>
			
		</div>
		<div class="col-lg-3 col-md-4 col-sm-12 col-xs-12 Services-tab item">
			<a href="{{ route('administrador.editais') }}">
			<div class="folded-corner service_tab_1">
				<div class="text">
					<i class="fas fa-info-circle fa-5x fa-icon-image"></i>
					<h3>Gerenciar Editais</h3>
					<p>
						Adicionar, Editar e Remover Editais
					</p>
				</div>
			</div>
			</a>
		</div>
	</div>
</div>
@endsection


@section('footer')
    @include('layouts.footer')
@endsection