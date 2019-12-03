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
                    <div class="card-header">Edital Edital</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('editais.update', $edital->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')

                            <div class="form-group row">
                                <label for="titulo" class="col-md-4 col-form-label text-md-right">Título do edital</label>

                                <div class="col-md-6">
                                    <input id="titulo" type="text"
                                           class="form-control @error('titulo') is-invalid @enderror" name="titulo"
                                           value="{{ $edital->titulo }}" required autocomplete="titulo" autofocus>

                                    @error('titulo')
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
                                           value="{{ $edital->descricao}}" rows="5" required autocomplete="descricao"></textarea>

                                    @error('descricao')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="data" class="col-md-4 col-form-label text-md-right">Data</label>

                                <div class="col-md-6">
                                    <input id="data" 
                                           class="form-control @error('data') is-invalid @enderror" name="data"
                                           value="{{ $edital->data }}" rows="5" required autocomplete="data" type="date">

                                    @error('data')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                    <label for="arquivo" class="col-md-4 col-form-label text-md-right">Arquivo PDF</label>
                                    <div class="col-md-6">
                                        <input type="file" class="form-control-file" name="arquivo">
                                        @error('arquivo')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    

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


