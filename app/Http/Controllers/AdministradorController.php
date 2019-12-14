<?php

namespace App\Http\Controllers;

use App\Professor;
use App\Aluno;
use App\Edital;
use App\Projeto;
use Illuminate\Http\Request;

class AdministradorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('administrador.index');
    }

    public function professores()
    {
        $professores = Professor::all();
        return view('administrador.professores')->with(compact('professores'));
    }
   
    public function alunos()
    {
        $alunos = Aluno::all();
        return view('administrador.alunos')->with(compact('alunos'));
    }

    public function projetos()
    {
        $projetos = Projeto::all();
        return view('administrador.projetos')->with(compact('projetos'));
    }

    public function editais()
    {
        $editais = Edital::all();
        return view('administrador.editais')->with(compact('editais'));
    }
}
