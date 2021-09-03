@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center mb-4">
        <h3>Adaugare Cladire</h3>
    </div>
    
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form method="post" action="{{ route('cladiri.update', $cladiri) }}">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <a href="{{ route('cladiri.index') }}" class="btn btn-rounded btn-primary mb-5">Inapoi</a>
                </div>

                <div class="form-group">
                    <h5>Complex <span class="text-danger">*</span></h5>
                    <div class="controls">
                        <select name="complex_id"  required="" class="form-control">
                            <option value="" selected="" disabled="">Selecteaza numele complexului</option>
                            @foreach($complexe as $complex)
                            <option value="{{ $complex->id }}" {{ ($cladiri->complex_id == $complex->id)? "selected": "" }}>{{ $complex->nume }}</option>
                            @endforeach
                        </select>                                    
                    </div>
                </div>   

                <div class="form-group">
                    <h5> Nume <span class="text-danger">*</span></h5>
                    <div class="controls">
                        <input type="text" name="nume" value="{{ $cladiri->nume }}" class="form-control" required="">
                        
                    </div>
                </div>

                <div class="form-group">
                    <h5>Numar de etaje <span class="text-danger">*</span></h5>
                    <div class="controls">
                        <input type="nume" name="numar_etaje" value="{{ $cladiri->numar_etaje }}" class="form-control"  required="">
                    </div>
                </div>

                <div class="text-xs-right">
                    <input type="submit" value="Submit" class="btn btn-rounded btn-info md-5">
                </div>
            </form>
        </div>
    </div>
</div>





@endsection