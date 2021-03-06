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
        <div class="container">
			<div class="row">
				<div class="container d-flex mb-3 m-3">
					<div class="col">
						<img src="/storage/{{$aluno->imagem}}" width=150px>
					</div>
					<div class="col-10">
						<h2>{{$aluno->nome}}</h2>							
						<p>{{$aluno->descricao}}</p>							
					</div>
				</div>	
			</div>
        </div>
    </div>
</div>




@endsection('content')


@section('footer')
    @include('layouts.footer')
@endsection