<?php

namespace App\Http\Controllers;

use App\Projeto;
use Illuminate\Http\Request;

class ProjetoController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth')->only(['create', 'update', 'store', 'edit', 'destroy']);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projetos  = Projeto::all();
        return view('projeto.index')->with(compact('projetos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('projeto.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $dado_projeto = $request->validate([
            'nome' => ['required', 'string'],
            'descricao' => ['required', 'string'],
            'finalizado' => ['required', 'boolean'],
        ]);


        $projeto_salvo = Projeto::create($dado_projeto);


        foreach ($request['imagem'] as $key => $value) {
            $imagem_path = $value->store('uploads', 'public');
            $projeto_salvo->imagens()->create(['imagem' => $imagem_path]);
        }

        return $this->index();
    }

    /**
     * Display the specified resource.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $projeto = Projeto::findOrFail($id);
        return view('projeto.show')->with(compact('projeto'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $projeto = Projeto::findOrFail($id);
        return view('projeto.edit')->with(compact('projeto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'nome' => ['required', 'string'],
            'descricao' => ['required', 'string'],
            'finalizado' => ['required', 'boolean']
        ]);

        $projeto = Projeto::findOrFail($id);

        $projeto->nome = $data['nome'];
        $projeto->descricao = $data['descricao'];
        $projeto->finalizado = $data['finalizado'];

        $projeto->save();

        return $this->index();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Projeto::destroy($id);
        return $this->index();
    }


    public function index_finalizados()
    {
        $projetos  = Projeto::where('finalizado', true)->get();
        return view('projeto.index')->with(compact('projetos'));
    }


    public function index_nao_finalizados()
    {
        $projetos  = Projeto::where('finalizado', false)->get();
        return view('projeto.index')->with(compact('projetos'));
    }

}
