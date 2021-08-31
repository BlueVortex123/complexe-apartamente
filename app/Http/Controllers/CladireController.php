<?php

namespace App\Http\Controllers;

use App\Models\Cladire;
use Illuminate\Http\Request;

class CladireController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cladire = Cladire::with(['complex','apartamente'])->get();
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
            'numar_etaje' => 'required|string|min:1|max:2',
        ]);
        
        $cladire = new Cladire($validated);
        $cladire->complex_id = $request->cladire_id;
        $cladire->save();
    }
    
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cladire  $cladire
     * @return \Illuminate\Http\Response
     */
    public function show(Cladire $cladire)
    {
        //
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cladire  $cladire
     * @return \Illuminate\Http\Response
     */
    public function edit(Cladire $cladire)
    {
        //
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cladire  $cladire
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cladire $cladire)
    {
        $validated = $request->validate([
            'nume' => 'required|string|min:3|max:255',
            'numar_etaje' => 'required|string|min:1|max:2',
        ]);
        
        $cladire->update($validated);
        $cladire->complex_id = $request->complex_id;
        $cladire->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cladire  $cladire
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cladire $cladire)
    {
        //
    }
}
