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
        $apartamente = Apartament::with(['cladire','proprietar'])->get();
        $proprietari = Proprietar::with(['apartamente'])->get();
    
        return view('pages.apartamente.index_apartamente', compact('apartamente','proprietari'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cladiri = Cladire::with('apartamente')->get();
        return view('pages.apartamente.create_apartamente'. compact('cladiri'));
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
            ]);
            
            $apartamente = new Apartament($valdiated);
            $apartamente->cladiri_id = $request->cladiri_id;
            
            $apartamente->save();

            return redirect()->route('apartamente.index');
        }
        
        /**
         * Display the specified resource.
         *
         * @param  \App\Models\Apartament  $apartament
         * @return \Illuminate\Http\Response
         */
        public function show(Apartament $apartamente,$id)
        {
            //
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

            return view('pages.apartamente.edit_apartamente'. compact('cladiri','proprietari'));
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
                ]);

            $apartamente->update($valdiated);

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
        $apartament = Apartament::onlyTrashed()->whereNotNull('deleted_at')->get();
      
    }

    public function restoreApartament(Request $request, $id)
    {
        Apartament::onlyTrashed()->find($id)->restore();
        
    }

    public function permanentlyDeleteApartament(Request $request, $id)
    {
        Apartament::onlyTrashed()->find($id)->forceDelete();
     
    }
}
