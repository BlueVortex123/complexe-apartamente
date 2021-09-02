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
                        <select name="cladiri_id"  required="" class="form-control">
                            <option value="" selected="" disabled="">Selecteaza numele cladirii</option>
                            @foreach($cladiri as $cladire)
                            <option value="{{ $cladire->id }}">{{ $cladire->nume }}</option>
                            @endforeach
                        </select>                                    
                    </div>
                </div>   

                <div class="form-group">
                    <h5> Etaj <span class="text-danger">*</span></h5>
                    <div class="controls">
                        <input type="text" name="etaj" class="form-control" required="">
                    </div>
                </div>

                <div class="form-group">
                    <h5> Numar <span class="text-danger">*</span></h5>
                    <div class="controls">
                        <input type="text" name="numar" class="form-control" required="">
                    </div>
                </div>

                <div class="form-group">
                    <h5> Suprafata <span class="text-danger">*</span></h5>
                    <div class="controls">
                        <input type="text" name="suprafata" class="form-control" required="">
                    </div>
                </div>

                <div class="form-group">
                    <h5> Numar de Camere <span class="text-danger">*</span></h5>
                    <div class="controls">
                        <input type="text" name="numar_camere" class="form-control" required="">
                    </div>
                </div>

                <div class="form-check ">
                    <label><h5>Vedere la mare</h5></label><br>
                    <input type="checkbox" name="vedere"  class="form-check-input float-md-right ">Da<br>                                                               
                </div>

                <div class="text-xs-right">
                    <input type="submit" value="Submit" class="btn btn-rounded btn-info md-5">
                </div>
            </form>
        </div>
    </div>
</div>





@endsection