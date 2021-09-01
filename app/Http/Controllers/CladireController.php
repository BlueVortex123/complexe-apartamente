<?php

namespace App\Http\Controllers;

use App\Models\Cladire;
use App\Models\Complex;
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
        $cladiri = Cladire::with(['complex'])->get();
        return view('pages.cladiri.index_cladiri',compact('cladiri'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $complexe = Complex::with('cladiri')->get();
        return view('pages.cladiri.create_cladiri',compact('complexe'));
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
            $cladire->complex_id = $request->complex_id;
            $cladire->save();
            
            return redirect()->route('cladiri.index');
        }
        
        /**
         * Display the specified resource.
         *
         * @param  \App\Models\Cladire  $cladire
         * @return \Illuminate\Http\Response
         */
        public function show(Cladire $cladiri)
        {
        
        }
        
        /**
         * Show the form for editing the specified resource.
         *
         * @param  \App\Models\Cladire  $cladire
         * @return \Illuminate\Http\Response
         */
        public function edit(Cladire $cladiri)
        {
            
            $complexe = Complex::with('cladiri')->get();
            return view('pages.cladiri.edit_cladiri',compact('complexe', 'cladiri'));
            
        }
        
        /**
         * Update the specified resource in storage.
         *
         * @param  \Illuminate\Http\Request  $request
         * @param  \App\Models\Cladire  $cladire
         * @return \Illuminate\Http\Response
         */
    public function update(Request $request, Cladire $cladiri)
    {
        $validated = $request->validate([
            'nume' => 'required|string|min:3|max:255',
            'numar_etaje' => 'required|string|min:1|max:2',
        ]);
        
        $cladiri->update($validated);
        $cladiri->complex_id = $request->complex_id;
        $cladiri->save();

        return redirect()->route('cladiri.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cladire  $cladire
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cladire $cladiri)
    {
        $cladiri->delete();

        return redirect()->route('cladiri.index');
    }

    public function onlyTrashedCladiri()
    {
        $cladire = Cladire::onlyTrashed()->whereNotNull('deleted_at')->get();
      
    }

    public function restoreCladiri(Request $request, $id)
    {
        Cladire::onlyTrashed()->find($id)->restore();
        
    }

    public function permanentlyDeleteCladiri(Request $request, $id)
    {
        Cladire::onlyTrashed()->find($id)->forceDelete();
     
    }

   
}
