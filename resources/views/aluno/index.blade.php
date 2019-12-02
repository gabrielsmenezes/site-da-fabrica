@extends('layouts.app')


@section('header')
    @include('layouts.header')
@endsection

@section('nav')
    @include('layouts.nav')
@endsection

@section('content')
<div class="container">
    <div class="container mb-5">
        <h1>Alunos</h1>
		<div class="album py-5 bg-light">
			<div class="row">
				@foreach($alunos as $aluno)
				

				<div class="col-md-3">
					<div class="card mb-4 box-shadow p-3 m-3">
						<img class="card-img-top" src="/storage/{{$aluno->imagem}}" width=175 height=auto>
						<div class="card-body">
							<div class="card-text">
									<a href="{{route('alunos.show', $aluno->id)}}">
										<p>{{$aluno->nome}}</p>
									</a>
								@if (strlen($aluno->descricao) > 120)
								<p>{{substr($aluno->descricao,0,120)}} ...
									<a href="{{route('alunos.show', $aluno->id)}}">Continuar lendo</a>
								</p>								
								@else
								<p>{{$aluno->descricao}}</p>							
								@endif
							</div>	
						</div>
					</div>
				</div>
				@endforeach
			</div>
        </div>
    </div>
</div>
@endsection('content')


@section('footer')
    @include('layouts.footer')
@endsection