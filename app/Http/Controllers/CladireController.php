<?php

namespace App\Http\Controllers;

use App\Http\Requests\Cladire\StoreCladireRequest;
use App\Http\Requests\Cladire\UpdateCladireRequest;
use App\Models\Apartament;
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
        $cladiri = Cladire::with('complex','apartamente')->get();
        $apartamente = Apartament::with('cladire')->get();

        // dd($cladiri->pluck('')->count('id'));
       

       
        return view('pages.cladiri.index_cladiri',compact('cladiri','apartamente'));
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
    public function store(StoreCladireRequest $request)
    {
       
    
            $cladire =  Cladire::create($request->validated());
            $cladire->save();
            
            return redirect()->route('cladiri.index');
        }
        
        /**
         * Display the specified resource.
         *
         * @param  \App\Models\Cladire  $cladire
         * @return \Illuminate\Http\Response
         */
        public function show($id)
        {
            $cladire = Cladire::find($id);
            $apartamente = Apartament::with('cladire')->where('cladiri_id',$id)->get();
            return view('pages.cladiri.show_cladiri',compact('cladire','apartamente'));
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
    public function update(UpdateCladireRequest $request, Cladire $cladiri)
    {
      
        
        $cladiri->update($request->validated());
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

    public function onlyTrashedCladire()
    {
        $cladiri = Cladire::onlyTrashed()->whereNotNull('deleted_at')->get();
        return view('pages.cladiri.trashed_cladiri',compact('cladiri'));
      
    }

    public function restoreCladire(Request $request, $id)
    {
        Cladire::onlyTrashed()->find($id)->restore();
        return redirect()->route('trashed_cladiri');
        
    }
    
    public function permanentlyDeleteCladire(Request $request, $id)
    {
        Cladire::onlyTrashed()->find($id)->forceDelete();
        return redirect()->route('trashed_cladiri');
     
    }

   
}
