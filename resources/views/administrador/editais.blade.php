@extends('layouts.app')


@section('header')
    @include('layouts.header')
@endsection

@section('nav')
    @include('layouts.nav')
@endsection

@section('content')
    <div class="mb-4 d-flex justify-content-between">
        <h1>Gerenciar Editais</h1>
        <a href="{{ route('editais.create') }}" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Adicionar</a>
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
                    <div class="d-flex">
                        <a href="{{ route('editais.show', $edital->id) }}" class="btn btn-primary btn-sm active mr-2" role="button" aria-pressed="true">Detalhes</i></a>
        
                        <a href="{{ route('editais.edit', $edital->id) }}" class="btn btn-primary btn-sm active mr-2" role="button" aria-pressed="true">Editar</a>
        
                        <form action="{{ route('editais.destroy', $edital->id) }}" method="POST">
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