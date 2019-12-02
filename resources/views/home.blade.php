@extends('layouts.app')

@section('header')
    @include('layouts.header')
@endsection

@section('nav')
    @include('layouts.nav')
@endsection

@section('content')
<div class="container">
    <h2>O que é a Fábrica de Software?</h1>
    <p>A fábrica de software é um ambiente destinado ao projeto e desenvolvimento de sistemas, direcionados a resolução de problemas propostos pela comunidade acadêmica.</p>
    <h2>Objetivo</h2>
    <p>Tem como objetivo proporcionar aos alunos ingressantes na fábrica a vivência e aplicação, na prática, dos conceitos da área de Engenharia de Software, obtidos durante o curso, em projetos de softwares reais.</p>
</div>
@endsection


@section('footer')
    @include('layouts.footer')
@endsection