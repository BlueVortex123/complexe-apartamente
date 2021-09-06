<?php

namespace App\Http\Controllers;

use App\Http\Requests\Complex\StoreComplexRequest;
use App\Http\Requests\Complex\UpdateComplexRequest;
use App\Models\Cladire;
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
        $complexe = Complex::all();
        return view('pages.complex.index_complex',compact('complexe'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.complex.create_complex');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreComplexRequest $request)
    {
       
        $complex = Complex::create($request->validated());
        $complex->nume = $request->nume;
        $complex->adresa = $request->adresa;
        $complex->save();

        return redirect()->route('complexe.index');
        
        
    }
    
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Complex  $complex
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $complex = Complex::find($id);
        $cladiri = Cladire::with('complex')->where('complex_id',$id)->get();
        return view('pages.complex.show_complex',compact('cladiri','complex'));
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Complex  $complex
     * @return \Illuminate\Http\Response
     */
    public function edit(Complex $complexe)
    {
        return view('pages.complex.edit_complex',compact('complexe'));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Complex  $complex
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateComplexRequest $request, Complex $complexe)
    {
       
            $complexe->update($request->validated());
            $complexe->save();
            
            return redirect()->route('complexe.index');
        }
        
        /**
         * Remove the specified resource from storage.
     *
     * @param  \App\Models\Complex  $complex
     * @return \Illuminate\Http\Response
     */
    public function destroy(Complex $complexe)
    {
        $complexe->delete();

        return redirect()->route('complexe.index');
    }

    public function onlyTrashedComplex()
    {
        $complexe = Complex::onlyTrashed()->whereNotNull('deleted_at')->get();
        return view('pages.complex.trashed_complex',compact('complexe'));
      
    }

    public function restoreComplex(Request $request, $id)
    {
        Complex::onlyTrashed()->find($id)->restore();
        return redirect()->route('trashed_complex');
    }
    
    public function permanentlyDeleteComplex(Request $request, $id)
    {
        Complex::onlyTrashed()->find($id)->forceDelete();
        return redirect()->route('trashed_complex');
     
    }
}
