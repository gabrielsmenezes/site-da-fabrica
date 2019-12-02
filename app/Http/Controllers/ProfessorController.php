<?php

namespace App\Http\Controllers;

use App\Professor;
use Illuminate\Http\Request;

class ProfessorController extends Controller
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
        $professores = Professor::all();
        return view('professor.index')->with(compact('professores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('professor.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dado = $request->validate([
            'nome' => ['required', 'string'],
            'descricao' => ['required', 'string'],
            'imagem' => ['image'],
        ]);

        $imagem = $request['imagem']->store('uploads', 'public');


        Professor::create([
            'nome' => $dado['nome'],
            'descricao' => $dado['descricao'],
            'imagem' => $imagem
        ]);


        return $this->index();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Professor  $professor
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $professor = Professor::findOrFail($id);
        return view('professor.show')->with(compact('professor'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Professor  $professor
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $professor = Professor::findOrFail($id);
        return view('professor.edit')->with(compact('professor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Professor  $professor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $dado = $request->validate([
            'nome' => ['required', 'string'],
            'descricao' => ['required', 'string'],
            'imagem' => ['image'],
        ]);

        $professor = Professor::findOrFail($id);


        $imagem = $request['imagem']->store('uploads', 'public');

        $professor->nome = $dado['nome'];
        $professor->descricao = $dado['descricao'];
        $professor->imagem = $dado['imagem'];


        $professor->save();

        return $this->index();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Professor  $professor
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Professor::destroy($id);
        return $this->index();
    }
}
