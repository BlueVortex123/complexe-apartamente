<?php

namespace App\Http\Controllers;

use App\Models\Proprietar;
use Illuminate\Http\Request;

class ProprietarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $proprietari = Proprietar::with('apartamente')->get();
        $proprietari = Proprietar::all();
        return view('pages.proprietar.index_proprietar',compact('proprietari'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.proprietar.create_proprietar');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nume' => 'required|string',
            'CNP' => 'required|string',
            'adresa' => 'required|string',
            'telefon' => 'required|string|min:5|max:20',
            'email' => 'required|email',
        ]);
        
        $proprietar = new Proprietar($validated);
        $proprietar->nume = $request->nume;
        $proprietar->CNP = $request->CNP;
        $proprietar->adresa = $request->adresa;
        $proprietar->telefon = $request->telefon;
        $proprietar->email = $request->email;
        $proprietar->save();

        return redirect()->route('proprietari.index');
    }
    
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Proprietar  $proprietar
     * @return \Illuminate\Http\Response
     */
    public function show(Proprietar $proprietar)
    {
        //
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Proprietar  $proprietar
     * @return \Illuminate\Http\Response
     */
    public function edit(Proprietar $proprietari)
    {
        return view('pages.proprietar.edit_proprietar',compact('proprietari'));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Proprietar  $proprietar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Proprietar $proprietari)
    {
        $validated = $request->validate([
            'nume' => 'required|string',
            'CNP' => 'required|string',
            'adresa' => 'required|string|min:4|max:255',
            'telefon' => 'required|string',
            'email' => 'required|email|min:5',
        ]);
        
        $proprietari->update($validated);
        $proprietari->save();

        return redirect()->route('proprietari.index');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Proprietar  $proprietar
     * @return \Illuminate\Http\Response
     */
    public function destroy(Proprietar $proprietari)
    {
        $proprietari->delete();
        return redirect()->route('proprietari.index');

    }

    
    public function onlyTrashedProprietari()
    {
        $proprietari = Proprietar::onlyTrashed()->whereNotNull('deleted_at')->get();
      
    }

    public function restoreProprietari(Request $request, $id)
    {
        Proprietar::onlyTrashed()->find($id)->restore();
        
    }

    public function permanentlyDeleteProprietari(Request $request, $id)
    {
        Proprietar::onlyTrashed()->find($id)->forceDelete();
     
    }


}
