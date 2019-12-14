@extends('layouts.app')


@section('header')
    @include('layouts.header')
@endsection

@section('nav')
    @include('layouts.nav')
@endsection

@section('content')
        <div class="mb-4 d-flex justify-content-between">
            <h1>Gerenciar Professores</h1>
            <a href="{{ route('professores.create') }}"
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
            @foreach($professores as $professor)
                <tr>
                    <td>{{ $professor->id }}</td>
                    <td>{{ $professor->nome }}</td>
                    
                    <td>
                        <div class="d-flex">
                            <a href="{{ route('professores.show', $professor->id) }}" class="btn btn-primary btn-sm active  mr-2"
                                    role="button" aria-pressed="true">Detalhes</i></a>
            
                            <a href="{{ route('professores.edit', $professor->id) }}" class="btn btn-primary btn-sm active  mr-2"
                            role="button" aria-pressed="true">Editar</a>
    
                
                            <form action="{{ route('professores.destroy', $professor->id) }}" method="POST">
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