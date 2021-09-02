@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
      
            <div class="col-md-12">
                <a href="{{ route('cladiri.index') }}" class="btn btn-outline-secondary">Inapoi</a>
            </div>
            
            <div class="col-md-12">
                <h3>Nume Cladire: {{ $cladire->nume }}</h3>
                <h3>Numar de Etaje: {{ $cladire->numar_etaje }} </h3>
             
            </div>

            <div class="col-md-6">
                <h3>Lista de Apartamente:</h3>
               
                    @foreach ($apartamente as $apartament)
                        <li>
                          
                           <a href="{{ URL::to('aparatamente/'.$apartament->id) }}">{{ $apartament->numar }}</a>  
                        </li>
                        
                    @endforeach
                
            </div>
       
        </div>
    </div>
@endsection