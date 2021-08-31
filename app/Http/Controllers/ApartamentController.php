<?php

namespace App\Http\Controllers;

use App\Models\Apartament;
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
        $apartament = Apartament::with(['cladire','proprietari'])->get();
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
        $valdiated = $request->validate([
            'etaj' => 'required',
            'numar' => 'required',
            'suprafata' => 'required',
            'numar_camere' => 'required',
            ]);
            
            $apartamente = new Apartament($valdiated);
            $apartamente->cladiri_id = $request->cladiri_id;
            
            $apartamente->save();
        }
        
        /**
         * Display the specified resource.
         *
         * @param  \App\Models\Apartament  $apartament
         * @return \Illuminate\Http\Response
         */
        public function show(Apartament $apartament)
        {
            //
        }
        
        /**
         * Show the form for editing the specified resource.
         *
         * @param  \App\Models\Apartament  $apartament
         * @return \Illuminate\Http\Response
         */
        public function edit(Apartament $apartament)
        {
            //
        }
        
        /**
         * Update the specified resource in storage.
         *
         * @param  \Illuminate\Http\Request  $request
         * @param  \App\Models\Apartament  $apartament
         * @return \Illuminate\Http\Response
         */
        public function update(Request $request, Apartament $apartament)
        {
            
            $valdiated = $request->validate([
                'etaj' => 'required',
                'numar' => 'required',
                'suprafata' => 'required',
                'numar_camere' => 'required',
                ]);

            $apartament->update($valdiated);

            $apartament->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Apartament  $apartament
     * @return \Illuminate\Http\Response
     */
    public function destroy(Apartament $apartament)
    {
        $apartament->delete();
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
