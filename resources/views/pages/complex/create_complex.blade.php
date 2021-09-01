@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center mb-4">
        <h3>Adaugare nou complex</h3><br>
    </div>
    
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form method="post" action="{{ route('complexe.store') }}">
                @csrf

                <div class="form-group">
                    <a href="{{ route('complexe.index') }}" class="btn btn-rounded btn-primary mb-5">Inapoi</a>
                </div>

                <div class="form-group">
                    <h5> Nume <span class="text-danger">*</span></h5>
                    <div class="controls">
                        <input type="text" name="nume" class="form-control" required="">
                    </div>
                </div>



                <div class="form-group">
                    <h5>Adresa <span class="text-danger">*</span></h5>
                    <div class="controls">
                        <input type="text" name="adresa" class="form-control"  required="">
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