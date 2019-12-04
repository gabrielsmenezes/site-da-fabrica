@extends('layouts.app')


@section('header')
    @include('layouts.header')
@endsection

@section('nav')
    @include('layouts.nav')
@endsection

@section('content')
    <div class="container">
        <div class="mb-4">
            <h1>Gerenciar projetos</h1>
        </div>
        <table class="table table-striped table-bordered w-100">
            <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Ações</th>
            </tr>
            </thead>
            <tbody>
            @foreach($projetos as $projeto)
                <tr>
                    <td>{{ $projeto->id }}</td>
                    <td>{{ $projeto->nome }}</td>
                    
                    <td>
                        <a href="{{ route('projetos.show', $projeto->id) }}" class="btn btn-primary btn-sm active"
                        role="button" aria-pressed="true">Detalhes</i></a>

                        <a href="{{ route('projetos.edit', $projeto->id) }}" class="btn btn-primary btn-sm active my-1"
                        role="button" aria-pressed="true">Editar</a>


                        <form action="{{ route('projetos.destroy', $projeto->id) }}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button class="btn btn-primary btn-sm active" >Remover</button>
                        </form>


                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <a href="{{ route('projetos.create') }}"
        class="btn btn-primary btn-lg active my-5"
        role="button" aria-pressed="true">Adicionar</a>
    </div>
@endsection

@section('footer')
    @include('layouts.footer')
@endsection