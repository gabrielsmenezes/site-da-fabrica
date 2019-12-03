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
					
					<div class="col-10">
						<h2>{{$edital->titulo}}</h2>							
						<p>{{$edital->descricao}}</p>
						<div class="container d-flex">
							<p><input type="date" class='form-control' value="{{$edital->data}}" readonly></p>
							<p class="col-6"><a href="/storage/{{$edital->arquivo}}">Download</a></p>
						</div>
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