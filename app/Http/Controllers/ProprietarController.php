<?php

namespace App\Http\Controllers;

use App\Http\Requests\Proprietar\StoreProprietarRequest;
use App\Http\Requests\Proprietar\UpdateProprietarRequest;
use App\Models\Apartament;
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
        $proprietari = Proprietar::with('apartamente')->get();
        $apartamente = Apartament::with('proprietar')->get();
 
        return view('pages.proprietar.index_proprietar',compact('proprietari','apartamente'));
    }

    /**
     * Show the form for creating a new resource.apar
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $apartamente = Apartament::with('proprietar')->get();
        $proprietari = Proprietar::with('apartamente')->get();
        return view('pages.proprietar.create_proprietar',compact('apartamente','proprietari'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProprietarRequest $request)
    {
    
        $proprietar = Proprietar::create($request->validated());

        $proprietar->save();

        return redirect()->route('proprietari.index');
    }
    
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Proprietar  $proprietar
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $proprietari = Proprietar::with('apartamente')->find($id);
        $apartamente = Apartament::with('proprietar')->where('proprietari_id',$id)->get();
        
        return view('pages.proprietar.show_proprietari',compact('proprietari','apartamente'));
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Proprietar  $proprietar
     * @return \Illuminate\Http\Response
     */
    public function edit(Proprietar $proprietari)
    {
        
        $selectedApartments = $proprietari->apartamente->map(function ($apartamente) {
            return $apartamente->id;
        })->toArray();

      

        return view('pages.proprietar.edit_proprietar',compact('proprietari','selectedApartments'));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Proprietar  $proprietar
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProprietarRequest $request, Proprietar $proprietari)
    {
           
            $proprietari->update($request->validated());
            $proprietari->save();
            
            $apartmente = Apartament::whereNotIn('id', (request('apartamente')) ? request('apartamente') : [])->where('proprietari_id', $proprietari->id)->update(['proprietari_id' => null]);

            // dd($proprietari->toArray());
        
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

    
    public function onlyTrashedProprietar()
    {
        $proprietari = Proprietar::onlyTrashed()->whereNotNull('deleted_at')->get();
        return view('pages.proprietar.trashed_proprietar',compact('proprietari'));
      
    }

    public function restoreProprietar(Request $request, $id)
    {
        Proprietar::onlyTrashed()->find($id)->restore();
        return redirect()->route('trashed_proprietar');
    }
    
    public function permanentlyDeleteProprietar(Request $request, $id)
    {
        Proprietar::onlyTrashed()->find($id)->forceDelete();
        return redirect()->route('trashed_proprietar');
     
    }


}
