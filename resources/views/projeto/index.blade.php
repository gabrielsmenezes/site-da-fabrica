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
        <h1>Projetos</h1>
		<div class="container">
			<div class="row">
				@foreach($projetos as $projeto)
				
					<div class="container d-flex mb-3 m-3">
						<div class="col">
							@if(count($projeto->imagens)>0)
							<img src="/storage/{{$projeto->imagens[0]->imagem}}" width=150px>
							@endif
						</div>
						<div class="col-10">
							<a href="{{ route('projetos.show', $projeto->id)}}"><h2>{{$projeto->nome}}</h2></a>							
							
							@if (strlen($projeto->descricao) > 300)
							<p>{{substr($projeto->descricao,0,300)}} ... 
								<a href="{{route('projetos.show', $projeto->id)}}">Continuar lendo</a>
							</p>								
							@else
							<p>{{$projeto->descricao}}</p>							
							@endif
						</div>
					</div>	
				@endforeach
			</div>
        </div>
    </div>
</div>
@endsection('content')
