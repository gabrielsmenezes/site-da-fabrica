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
            <h1>Gerenciar Editais</h1>
        </div>
        <table class="table table-striped table-bordered w-100">
            <thead>
            <tr>
                <th>ID</th>
                <th>Titulo</th>
                <th>Data</th>
                <th>Ações</th>
            </tr>
            </thead>
            <tbody>
            @foreach($editais as $edital)
                <tr>
                    <td>{{ $edital->id }}</td>
                    <td>{{ $edital->titulo }}</td>
                    <td>{{ $edital->data }}</td>
                    
                    <td>
                        <a href="{{ route('editais.show', $edital->id) }}" class="btn btn-primary btn-sm active"
                        role="button" aria-pressed="true">Detalhes</i></a>

                        <a href="{{ route('editais.edit', $edital->id) }}" class="btn btn-primary btn-sm active my-1"
                        role="button" aria-pressed="true">Editar</a>


                        <form action="{{ route('editais.destroy', $edital->id) }}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button class="btn btn-primary btn-sm active" >Remover</button>
                        </form>


                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <a href="{{ route('editais.create') }}"
        class="btn btn-primary btn-lg active my-5"
        role="button" aria-pressed="true">Adicionar</a>
    </div>
@endsection

@section('footer')
    @include('layouts.footer')
@endsection