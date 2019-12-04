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
            <h1>Gerenciar Professores</h1>
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
            @foreach($professores as $professor)
                <tr>
                    <td>{{ $professor->id }}</td>
                    <td>{{ $professor->nome }}</td>
                    
                    <td>
                        <a href="{{ route('professores.show', $professor->id) }}" class="btn btn-primary btn-sm active"
                        role="button" aria-pressed="true">Detalhes</i></a>

                        <a href="{{ route('professores.edit', $professor->id) }}" class="btn btn-primary btn-sm active my-1"
                        role="button" aria-pressed="true">Editar</a>


                        <form action="{{ route('professores.destroy', $professor->id) }}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button class="btn btn-primary btn-sm active" >Remover</button>
                        </form>


                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <a href="{{ route('professores.create') }}"
        class="btn btn-primary btn-lg active my-5"
        role="button" aria-pressed="true">Adicionar</a>
    </div>
@endsection

@section('footer')
    @include('layouts.footer')
@endsection