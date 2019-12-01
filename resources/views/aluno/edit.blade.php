@extends('layouts.app')


@section('header')
    @include('layouts.header')
@endsection

@section('nav')
    @include('layouts.nav')
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Editar Aluno</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('aluno.update', $aluno->id) }}">
                            @csrf
                            @method('PATCH')
                            <div class="form-group row">
                                <label for="nome" class="col-md-4 col-form-label text-md-right">Nome do Aluno</label>

                                <div class="col-md-6">
                                    <input id="nome" type="text"
                                           class="form-control @error('nome') is-invalid @enderror" name="nome"
                                           value="{{$aluno->nome}}" required autocomplete="nome" autofocus>

                                    @error('nome')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="descricao" class="col-md-4 col-form-label text-md-right">Descrição</label>

                                <div class="col-md-6">
                                    <textarea id="descricao" 
                                           class="form-control @error('descricao') is-invalid @enderror" name="descricao"
                                value="{{$aluno->descricao}}" rows="5" required autocomplete="descricao">{{$aluno->descricao}}</textarea>

                                    @error('descricao')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="egresso" class="col-md-4 col-form-label text-md-right">Egresso?</label>

                                <div class="col-md-6">
                                    <select id="egresso" 
                                    class="form-control @error('egresso') is-invalid @enderror" name="egresso"
                                    value="{{ $aluno->egresso }}" rows="5" required autocomplete="egresso">
                                            <option value=1 @if ($aluno->egresso == 1) selected="selected"@endif>Sim</option> 
                                            <option value=0 @if ($aluno->egresso == 0) selected="selected"@endif>Não</option> 
                                    </select>
                                    @error('egresso')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                    <label for="imagem" class="col-md-4 col-form-label text-md-right">Imagem</label>
                                <input type="file" class="form-control-file" name="imagem">
                                @error('imagem')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Atualizar
                                    </button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


