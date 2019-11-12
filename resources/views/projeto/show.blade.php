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
                <div class="container mb-3">
					<div class="col">
						<h1>{{$projeto->nome}}</h1>
						<p >{{$projeto->descricao}}</p>
					</div>
				</div>
				
				
				<div class="album py-5">
					<div class='row'>
						@foreach ($projeto->imagens as $imagem)
						<div class="col-3">
								<div class="card box-shadow p-3 m-3">
									<img class="card-img-top" src="/storage/{{$imagem->imagem}}">
									<div class="card-body">
										<div class="card-text">	
										</div>
									</div>
								</div>
							</div>	
						@endforeach
						

					</div>
				</div>



			</div>
        </div>
    </div>
</div>




@endsection('content')
