@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center mb-4">
        <h3>Editare proprietar</h3>
    </div>
    
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form method="post" action="{{ route('proprietari.update', $proprietari) }}">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <a href="{{ route('proprietari.index') }}" class="btn btn-rounded btn-primary mb-5">Inapoi</a>
                </div>

                <div class="form-group">
                    <h5> Nume <span class="text-danger">*</span></h5>
                    <div class="controls">
                        <input type="text" name="nume" value="{{ $proprietari->nume }}" class="form-control @error('nume') is-invalid @enderror" required="">
                        @error('nume')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  
                    </div>
                </div>

                <div class="form-group">
                    <h5> CNP <span class="text-danger">*</span></h5>
                    <div class="controls">
                        <input type="text" name="CNP" value="{{ $proprietari->CNP }}" class="form-control @error('CNP') is-invalid @enderror" required="">
                        @error('CNP')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                       
                    </div>
                </div>

                <div class="form-group">
                    <h5> Adresa <span class="text-danger">*</span></h5>
                    <div class="controls">
                        <input type="text" name="adresa" value="{{ $proprietari->adresa }}" class="form-control @error('adresa') is-invalid @enderror" required="">
                        @error('adresa')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                        
                    </div>
                </div>

                <div class="form-group">
                    <h5> Telefon <span class="text-danger">*</span></h5>
                    <div class="controls">
                        <input type="text" name="telefon" value="{{ $proprietari->telefon }}" class="form-control @error('telefon') is-invalid @enderror" required="">
                        @error('telefon')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>
                </div>


                <div class="form-group">
                    <h5>Email <span class="text-danger">*</span></h5>
                    <div class="controls">
                        <input type="email" name="email" value="{{ $proprietari->email }}" class="form-control @error('email') is-invalid @enderror"  required="">
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label for='products'>
                        <h5>Apartamente<span class="text-danger">*</span></h5>
                    </label>
                    @if (count($proprietari->apartamente))
                        <select id="apartamente" class="custom-select @error('apartamente') is-invalid @enderror" autocomplete="apartamente" autofocus name="apartamente[]" multiple>
                            @foreach ($proprietari->apartamente as $apartament)
                                <option value="{{ $apartament->id }}" {{ in_array($apartament->id, $selectedApartments) ? 'selected' : ''}}>{{ $apartament->numar }}</option>

                            @endforeach
                    @endif

                    </select>
                </div>

                <div class="text-xs-right">
                    <input type="submit" value="Submit" class="btn btn-rounded btn-info md-5">
                </div>
            </form>
        </div>
    </div>
</div>





@endsection