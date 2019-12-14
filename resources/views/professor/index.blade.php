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
        <h1>Professores</h1>
		<div class="album py-5 bg-light">
			<div class="row">
				@foreach($professores as $professor)
				

				<div class="col-md-3">
					<div class="card mb-4 box-shadow p-3 m-3">
						<a href="{{route('professores.show', $professor->id)}}"></a>
						<img class="card-img-top" src="/storage/{{$professor->imagem}}" width=175 height=auto>
						<div class="card-body">
							<div class="card-text">
								<a href="{{route('professores.show', $professor->id)}}">
									<p>{{$professor->nome}}</p>
								</a>
								@if (strlen($professor->descricao) > 120)
								<p>{{substr($professor->descricao,0,120)}} ...
									<a href="{{route('professores.show', $professor->id)}}">Continuar lendo</a>
								</p>								
								@else
								<p>{{$professor->descricao}}</p>							
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