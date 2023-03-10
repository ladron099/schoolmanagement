<?php

namespace App\Http\Controllers;

use App\Models\semestre;
use Illuminate\Http\Request;

class SemestreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $semestres = semestre::all();
        return view("pages.semesteres.semestre_list")->with("semestres", $semestres);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("pages.semesteres.semestre_add");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, ['nom_semestre' => 'required|unique:semestres', 'date_debut' => 'required', 'date_fin' => 'required']);
        $new_semestre = new semestre();
        $new_semestre->nom_semestre =  $request->nom_semestre;
        $new_semestre->date_debut =  $request->date_debut;
        $new_semestre->date_fin =  $request->date_fin;
        $new_semestre->save();
        $semestres = semestre::all();
        return redirect("semestres/list")->with('success', 'semestre ajoutée avec succée')->with("semestres", $semestres);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
