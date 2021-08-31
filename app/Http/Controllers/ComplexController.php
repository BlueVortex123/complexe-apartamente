<?php

namespace App\Http\Controllers;

use App\Models\Complex;
use Illuminate\Http\Request;

class ComplexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $complex = Complex::all();
        
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
            'nume' => 'required|string|min:3|max:255',
            'adresa' => 'required|string|min:3|max:255',
            
        ]);
        
        $complex = new Complex($validated);
        $complex->nume = $request->nume;
        $complex->adresa = $request->adresa;
        $complex->save();
        
        
    }
    
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Complex  $complex
     * @return \Illuminate\Http\Response
     */
    public function show(Complex $complex)
    {
        //
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Complex  $complex
     * @return \Illuminate\Http\Response
     */
    public function edit(Complex $complex)
    {
        //
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Complex  $complex
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Complex $complex)
    {
        $validated = $request->validate([
            'nume' => 'required|string|min:3|max:255',
            'adresa' => 'required|string|min:3|max:255',
            
        ]);
        
        $complex->update($validated);
        $complex->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Complex  $complex
     * @return \Illuminate\Http\Response
     */
    public function destroy(Complex $complex)
    {
        $complex->delete();
    }

    public function onlyTrashedComplex()
    {
        $complexx = Complex::onlyTrashed()->whereNotNull('deleted_at')->get();
      
    }

    public function restoreComplex(Request $request, $id)
    {
        Complex::onlyTrashed()->find($id)->restore();
        
    }

    public function permanentlyDeleteComplex(Request $request, $id)
    {
        Complex::onlyTrashed()->find($id)->forceDelete();
     
    }
}
