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
        $proprietar = Proprietar::with('apartment')->get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'CNP' => 'required|string|min:13|max:13',
            'adresa' => 'required|string|min:4|max:255',
            'telefon' => 'required|string|min:5|max:20',
            'email' => 'required|email|min:5|max:13',
        ]);
        
        $proprietar = new Proprietar($validated);
        
        
        $proprietar->save();
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
    public function edit(Proprietar $proprietar)
    {
        //
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Proprietar  $proprietar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Proprietar $proprietar)
    {
        $validated = $request->validate([
            'nume' => 'required|string',
            'CNP' => 'required|string|min:13|max:13',
            'adresa' => 'required|string|min:4|max:255',
            'telefon' => 'required|string|min:5|max:20',
            'email' => 'required|email|min:5|max:13',
        ]);
        
        $proprietar->update($validated);

        $proprietar->save();
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Proprietar  $proprietar
     * @return \Illuminate\Http\Response
     */
    public function destroy(Proprietar $proprietar)
    {
        $proprietar->delete();

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
