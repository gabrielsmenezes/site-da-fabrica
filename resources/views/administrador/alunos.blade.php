@extends('layouts.app')


@section('header')
    @include('layouts.header')
@endsection

@section('nav')
    @include('layouts.nav')
@endsection

@section('content')
        <div class="mb-4 d-flex justify-content-between">
            <h1>Gerenciar Alunos</h1>
            <a href="{{ route('alunos.create') }}"
        class="btn btn-primary btn-lg active"
        role="button" aria-pressed="true">Adicionar</a>
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
            @foreach($alunos as $aluno)
                <tr>
                    <td>{{ $aluno->id }}</td>
                    <td>{{ $aluno->nome }}</td>
                    
                    <td>

                        <div class="d-flex">
                                <a href="{{ route('alunos.show', $aluno->id) }}" class="btn btn-primary btn-sm mr-2 active"
                                        role="button" aria-pressed="true">Detalhes</i></a>
        
                                <a href="{{ route('alunos.edit', $aluno->id) }}" class="btn btn-primary btn-sm mr-2 active"
                                role="button" aria-pressed="true">Editar</a>
        
        
                                <form action="{{ route('alunos.destroy', $aluno->id) }}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <button class="btn btn-primary btn-sm active" >Remover</button>
                                </form>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection

@section('footer')
    @include('layouts.footer')
@endsection