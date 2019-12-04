<?php

namespace App\Http\Controllers;

use App\Aluno;
use Illuminate\Http\Request;

class AlunoController extends Controller
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
        $alunos = Aluno::all();
        return view('aluno.index')->with(compact('alunos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('aluno.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        
        $dado_aluno = $request->validate([
            'nome' => ['required', 'string'],
            'descricao' => ['required', 'string'],
            'egresso' => ['required', 'boolean'],
            'imagem' => ['image'],
        ]);

        $imagem = $request['imagem']->store('uploads', 'public');


        $aluno_salvo = Aluno::create([
            'nome' => $dado_aluno['nome'],
            'descricao' => $dado_aluno['descricao'],
            'egresso' => $dado_aluno['egresso'],
            'imagem' => $imagem
        ]);


        return redirect()->route("administrador.alunos");
        ;
    }

    /**
     * Display the specified resource.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $aluno = Aluno::findOrFail($id);
        return view('aluno.show')->with(compact('aluno'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Aluno  $aluno
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $aluno = Aluno::findOrFail($id);
        return view('aluno.edit')->with(compact('aluno'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Aluno  $aluno
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'nome' => ['required', 'string'],
            'descricao' => ['required', 'string'],
            'egresso' => ['required', 'boolean'],
        ]);

        $aluno = Aluno::findOrFail($id);


        $aluno->nome = $data['nome'];
        $aluno->descricao = $data['descricao'];
        $aluno->egresso = $data['egresso'];
       
        if ($request["imagem"] != null) {
            $imagem = $data['imagem']->store('uploads', 'public');
            $aluno->imagem = $imagem;
        }

        $aluno->save();

        return redirect()->route("administrador.alunos");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Aluno  $aluno
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Aluno::destroy($id);
        return redirect()->route("administrador.alunos");
    }


    public function index_egressos()
    {
        $alunos  = Aluno::where('egresso', true)->get();
        return view('aluno.index')->with(compact('alunos'));
    }


    public function index_nao_egressos()
    {
        $alunos  = Aluno::where('egresso', false)->get();
        return view('aluno.index')->with(compact('alunos'));
    }

}
