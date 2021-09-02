@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
      
            <div class="col-md-12">
                <a href="{{ route('cladiri.index') }}" class="btn btn-outline-secondary">Inapoi</a>
            </div>
            
            <div class="col-md-12">
                {{-- <h3>Numar Apartament: {{ $apartamente->numar }}</h3> --}}

             
            </div>

            <div class="col-md-6">
                <h3>Lista de Apartamente:</h3>
               
               
                    @foreach ($apartamente as $apartament)
                        @foreach($proprietari->apartamente as $proprietar)
                        
                    
                    <li>
                        <a href="{{ URL::to('proprietari/'.$proprietar->id) }}">{{ $proprietar->nume }}</a>  
                    </li>     
                    
                    @endforeach
                    @endforeach
                        
                   
                
            </div>
       
        </div>
    </div>
@endsection