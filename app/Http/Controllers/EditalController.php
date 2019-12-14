<?php

namespace App\Http\Controllers;

use App\Edital;
use Illuminate\Http\Request;
use Carbon\Carbon;

class EditalController extends Controller
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
        $grupos  = Edital::all()->reverse()->groupBy(function ($val) {
            return Carbon::parse($val->data)->format('Y');
        });
        return view('edital.index')->with(compact('grupos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('edital.create');
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
            'titulo' => ['required', 'string'],
            'descricao' => ['required', 'string'],
            'data' => ['required', 'date'],
    ]);

        $uploadedFile = $request['arquivo'];
        $arquivo = $uploadedFile->storeAs('uploads', $uploadedFile->getClientOriginalName(), 'public');

        Edital::create([
            'titulo' => $dado['titulo'],
            'descricao' => $dado['descricao'],
            'data' => $dado['data'],
            'arquivo' => $arquivo
        ]);
        return redirect()->route("administrador.editais");

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Edital  $edital
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $edital = Edital::findOrFail($id);
        return view('edital.show')->with(compact('edital'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Edital  $edital
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $edital = Edital::findOrFail($id);
        return view('edital.edit')->with(compact('edital'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Edital  $edital
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // dd($request);

        $dado = $request->validate([
            'titulo' => ['required', 'string'],
            'descricao' => ['required', 'string'],
            'data' => ['required', 'date'],
             
        ]);

        $edital = Edital::findOrFail($id);

        $edital->titulo = $dado['titulo'];
        $edital->descricao = $dado['descricao'];
        $edital->data = $dado['data'];


        if ($request["arquivo"] != null) {
		$uploadedFile = $request['arquivo'];
		$arquivo = $uploadedFile->storeAs('uploads', $uploadedFile->getClientOriginalName(), 'public');
            $edital->arquivo = $arquivo;
        }

        $edital->save();

        return redirect()->route("administrador.editais");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Edital  $edital
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Edital::destroy($id);
        return redirect()->route("administrador.editais");
    }
}
