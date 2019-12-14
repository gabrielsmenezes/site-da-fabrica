@extends('layouts.app')

@section('header')
    @include('layouts.header')
@endsection

@section('nav')
    @include('layouts.nav')
@endsection

@section('content')

<div class="container">
        <p class="end">Endereço: Av. Costa e Silva - Vila Olinda, Campo Grande - MS</p>
        <p class="telefone">Telefone:(67) 3345-7867</p>
        <p class="email">E-mail: engsoft.facom@ufms.br</p>
    </div>


@endsection

@section('footer')
    @include('layouts.footer')
@endsection