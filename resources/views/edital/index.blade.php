@extends('layouts.app')


@section('header')
    @include('layouts.header')
@endsection

@section('nav')
    @include('layouts.nav')
@endsection

@section('content')
<div class="container">
        <h1>Editais</h1>
		<div class="container">
			<div class="row">
				
				@foreach($grupos->keys() as $key)
					<h2>{{$key}}</h2>
					@foreach($grupos[$key] as $edital)

					<div class="container d-flex mb-3 m-3">
						
						<div class="col-10">
							<a href="{{ route('editais.show', $edital->id)}}"><h3>{{$edital->titulo}}</h3></a>							
							
							@if (strlen($edital->descricao) > 300)
							<p>{{substr($edital->descricao,0,300)}} ... 
								<a href="{{route('editais.show', $edital->id)}}">Continuar lendo</a>
							</p>								
							@else
							<p>{{$edital->descricao}}</p>							
							@endif
						</div>
					</div>
					@endforeach
				@endforeach
			</div>
        </div>
    </div>
</div>
@endsection


@section('footer')
    @include('layouts.footer')
@endsection