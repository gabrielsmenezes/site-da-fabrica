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
            <h1>Gerenciar Alunos</h1>
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
                        <a href="{{ route('alunos.show', $aluno->id) }}" class="btn btn-primary btn-sm active"
                        role="button" aria-pressed="true">Detalhes</i></a>

                        <a href="{{ route('alunos.edit', $aluno->id) }}" class="btn btn-primary btn-sm active my-1"
                        role="button" aria-pressed="true">Editar</a>


                        <form action="{{ route('alunos.destroy', $aluno->id) }}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button class="btn btn-primary btn-sm active" >Remover</button>
                        </form>


                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <a href="{{ route('alunos.create') }}"
        class="btn btn-primary btn-lg active my-5"
        role="button" aria-pressed="true">Adicionar</a>
    </div>
@endsection

@section('footer')
    @include('layouts.footer')
@endsection