@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
      
            <div class="col-md-12">
                <a href="{{ route('cladiri.index') }}" class="btn btn-outline-secondary">Inapoi</a>
            </div>
            
            <div class="col-md-12">
                <h3>Numar Apartament: {{ $apartament->numar }}</h3>

             
            </div>

            <div class="col-md-6">
                <h3>Lista de Apartamente:</h3>
               
                <ul>
                    <li>{{ $apartament->proprietar->nume }}</li>
                </ul>
             
            </div>  
       
        </div>
    </div>
@endsection
