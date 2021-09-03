<?php

namespace App\Http\Controllers;

use App\Models\Apartament;
use App\Models\Cladire;
use App\Models\Proprietar;
use Illuminate\Http\Request;

class ApartamentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $apartamente = Apartament::with('cladire','proprietar')->get();
        $cladiri = Cladire::with('apartamente')->get();
        $proprietari = Proprietar::with('apartamente')->get();
    
        return view('pages.apartamente.index_apartamente', compact('apartamente','proprietari','cladiri'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cladiri = Cladire::with('apartamente')->get();
        $proprietari = Proprietar::with('apartamente')->get();
        return view('pages.apartamente.create_apartamente', compact('cladiri','proprietari'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $valdiated = $request->validate([
            'etaj' => 'required',
            'numar' => 'required',
            'suprafata' => 'required',
            'numar_camere' => 'required',
            'proprietari_id' => 'exists:proprietari,id|nullable'
            ]);
            
            $apartamente = new Apartament($valdiated);
            $apartamente->cladiri_id = $request->cladiri_id;
            $apartamente->vedere = $request->input('vedere') ? true : false;
            
            $apartamente->save();

            return redirect()->route('apartamente.index');
        }
        
        /**
         * Display the specified resource.
         *
         * @param  \App\Models\Apartament  $apartament
         * @return \Illuminate\Http\Response
         */
        public function show($id)
        {
            $apartament = Apartament::findOrFail($id);
            return view('pages.apartamente.show_apartamente', compact('apartament'));
        }
        
        /**
         * Show the form for editing the specified resource.
         *
         * @param  \App\Models\Apartament  $apartament
         * @return \Illuminate\Http\Response
         */
        public function edit(Apartament $apartamente)
        {
            $cladiri = Cladire::with('apartamente')->get();
            $proprietari = Proprietar::with('apartamente')->get();
        


            return view('pages.apartamente.edit_apartamente', compact('cladiri','proprietari','apartamente'));
        }
        
        /**
         * Update the specified resource in storage.
         *
         * @param  \Illuminate\Http\Request  $request
         * @param  \App\Models\Apartament  $apartament
         * @return \Illuminate\Http\Response
         */
        public function update(Request $request, Apartament $apartamente)
        {
            
            $valdiated = $request->validate([
                'etaj' => 'required',
                'numar' => 'required',
                'suprafata' => 'required',
                'numar_camere' => 'required',
                'proprietari_id' => 'exists:proprietari,id|nullable'
                ]);

            $apartamente->update($valdiated);
            $apartamente->proprietari_id = $request->proprietari_id;
            $apartamente->vedere = $request->input('vedere') ? true : false;

            $apartamente->save();

            return redirect()->route('apartamente.index');
        }
        
        /**
         * Remove the specified resource from storage.
         *
         * @param  \App\Models\Apartament  $apartament
         * @return \Illuminate\Http\Response
         */
        public function destroy(Apartament $apartamente)
        {
            $apartamente->delete();
            return redirect()->route('apartamente.index');
    }


    public function onlyTrashedApartament()
    {
        $apartamente = Apartament::onlyTrashed()->whereNotNull('deleted_at')->get();
        return view('pages.apartamente.trashed_apartamente',compact('apartamente'));
      
    }

    public function restoreApartament(Request $request, $id)
    {
        Apartament::onlyTrashed()->find($id)->restore();
        return redirect()->route('trashed_apartamente');
        
    }
    
    public function permanentlyDeleteApartament(Request $request, $id)
    {
        Apartament::onlyTrashed()->find($id)->forceDelete();
        return redirect()->route('trashed_apartamente');
     
    }
}
