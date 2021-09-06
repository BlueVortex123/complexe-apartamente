@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <h3>Editare Complexe</h3><br>
    </div>
   
    <div class="row justify-content-center">
        <div class="col-md-8">

            <form method="post" action="{{ route('complexe.update' , $complexe) }} ">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <a href="{{ route('complexe.index') }}" class="btn btn-rounded btn-primary mb-5">Complexe Memorate</a>
                </div>


                <div class="form-group">
                    <h5> Nume<span class="text-danger">*</span></h5>
                    <input type="text" name="nume" value="{{ $complexe->nume }}" class="form-control @error('nume') is-invalid @enderror" required="">
                    @error('nume')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <div class="controls">
                    </div>
                </div>
                
                <div class="form-group">
                    <h5>Adresa <span class="text-danger">*</span></h5>
                    <div class="controls">
                        <input type="text" name="adresa" value="{{ $complexe->adresa }}" class="form-control @error('adresa') is-invalid @enderror" required="">
                        @error('adresa')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>
                </div>

                <div class="text-xs-right">
                    <input type="submit" value="Update " class="btn btn-rounded btn-success ">
                </div>
            </form>
        </div>
    </div>
</div>


@endsection