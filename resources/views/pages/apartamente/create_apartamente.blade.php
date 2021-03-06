@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center mb-4">
        <h3>Adaugare Apartamment</h3>
    </div>
    
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form method="post" action="{{ route('apartamente.store') }}">
                @csrf

                <div class="form-group">
                    <a href="{{ route('apartamente.index') }}" class="btn btn-rounded btn-primary mb-5">Inapoi</a>
                </div>

                <div class="form-group">
                    <h5>Cladirea <span class="text-danger">*</span></h5>
                    <div class="controls">
                        <select name="cladiri_id"  required="" class="form-control @error('cladiri_id') is-invalid @enderror">
                            <option value="" selected="" disabled="">Selecteaza numele cladirii</option>
                            @foreach($cladiri as $cladire)
                            <option value="{{ $cladire->id }}">{{ $cladire->nume }}</option>
                            @endforeach
                        </select>      
                        @error('cladiri_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror                                                
                    </div>
                </div>   

                <div class="form-group">
                    <h5> Etaj <span class="text-danger">*</span></h5>
                    <div class="controls">
                        <input type="text" name="etaj" class="form-control @error('etaj') is-invalid @enderror" required="">
                        @error('etaj')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror                  
                    </div>
                </div>

                <div class="form-group">
                    <h5> Numar <span class="text-danger">*</span></h5>
                    <div class="controls">
                        <input type="text" name="numar" class="form-control @error('numar') is-invalid @enderror" required="">
                        @error('numar')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror                  
                    </div>
                </div>

                <div class="form-group">
                    <h5> Suprafata <span class="text-danger">*</span></h5>
                    <div class="controls">
                        <input type="text" name="suprafata" class="form-control @error('suprafata') is-invalid @enderror" required="">
                        @error('suprafata')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror                  
                    </div>
                </div>

                <div class="form-group">
                    <h5> Numar de Camere <span class="text-danger">*</span></h5>
                    <div class="controls">
                        <input type="text" name="numar_camere" class="form-control @error('numar_camere') is-invalid @enderror" required="">
                        @error('numar_camere')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror                  
                    </div>
                </div>

                <div class="form-check ">
                    <label><h5>Vedere la mare</h5></label><br>
                    <input type="checkbox" name="vedere"  class="form-check-input float-md-right">Da<br>                                                               
                </div>

                <div class="form-group">
                    <label for='proprietari_id'>Category</label>
                    <select id="proprietari_id" class="custom-select @error('proprietari_id') is-invalid @enderror" autocomplete="proprietari_id" autofocus name="proprietari_id">
                        @foreach ($proprietari as $proprietar)
                            <option value="{{ $proprietar->id }}" >{{ $proprietar->nume }}</option>
                        @endforeach
                    </select>
                    @error('proprietari_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="text-xs-right">
                    <input type="submit" value="Submit" class="btn btn-rounded btn-info md-5">
                </div>
            </form>
        </div>
    </div>
</div>





@endsection