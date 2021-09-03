@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
      
            <div class="col-md-12">
                <a href="{{ route('proprietari.index') }}" class="btn btn-outline-secondary">Inapoi</a>
            </div>
            
            <div class="col-md-12">
                <h3>Numar proprietar: {{ $proprietari->nume }}</h3>
                <h3>Numar telefon: {{ $proprietari->telefon }}</h3>
            </div>

            <div class="col-md-6">
                <h3>Lista de Apartamente:</h3>
               
                <ul>
                    @foreach ($apartamente as $apartament)
                        <li>
                          
                           <a href="{{ URL::to('apartamente/'.$apartament->id) }}">{{ $apartament->numar }}</a>  
                        </li>
                        
                    @endforeach
                </ul>
                
                
            </div>  

           
       
        </div>
    </div>
@endsection