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
                    <div class="card-header">Cadastrar Novo Projeto</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('projeto.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <label for="nome" class="col-md-4 col-form-label text-md-right">Nome de Projeto</label>

                                <div class="col-md-6">
                                    <input id="nome" type="text"
                                           class="form-control @error('nome') is-invalid @enderror" name="nome"
                                           value="{{ old('nome') }}" required autocomplete="nome" autofocus>

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
                                           value="{{ old('descricao') }}" rows="5" required autocomplete="descricao"></textarea>

                                    @error('descricao')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="finalizado" class="col-md-4 col-form-label text-md-right">Finalizado?</label>

                                <div class="col-md-6">
                                    <select id="finalizado" 
                                    class="form-control @error('finalizado') is-invalid @enderror" name="finalizado"
                                    value="{{ old('finalizado') }}" rows="5" required autocomplete="finalizado">
                                            <option value=1>Sim</option> 
                                            <option value=0>Não</option> 
                                    </select>
                                    @error('descricao')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                    <label for="imagem" class="col-md-4 col-form-label text-md-right">Imagem</label>
                                <input type="file" class="form-control-file" name="imagem[]" multiple>
                                @error('imagem')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Registrar
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


