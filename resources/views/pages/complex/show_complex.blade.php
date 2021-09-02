@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
      
            <div class="col-md-12">
                <a href="{{ route('complexe.index') }}" class="btn btn-outline-secondary">Inapoi</a>
            </div>
            
            <div class="col-md-12 align-self-auto">
                <h3>Nume Complex: {{ $complex->nume }}</h3>
                <h3>Adresa Complex: {{ $complex->adresa }} </h3>
             
            </div>

            <div class="col-md-6 align-self-auto">
                <h3>Lista de Cladiri:</h3>
               
                    @foreach ($cladiri as $cladire)
                        <li>
                          
                           <a href="{{ URL::to('cladiri/'.$cladire->id) }}">{{ $cladire->nume }}</a>  
                        </li>
                        
                    @endforeach
                
            </div>
       
        </div>
    </div>
@endsection