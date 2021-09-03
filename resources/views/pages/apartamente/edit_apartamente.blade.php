@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center mb-4">
        <h3>Editare Apartamment</h3>
    </div>
    
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form method="post" action="{{ route('apartamente.update', $apartamente) }}">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <a href="{{ route('apartamente.index') }}" class="btn btn-rounded btn-primary mb-5">Inapoi</a>
                </div>

                <div class="form-group">
                    <h5>Cladirea <span class="text-danger">*</span></h5>
                    <div class="controls">
                        <select name="cladiri_id"  required="" class="form-control">
                            <option value="" selected="" disabled="">Selecteaza numele cladirii</option>
                            @foreach($cladiri as $cladire)
                                <option value="{{ $cladire->id }}" {{ ($apartamente->cladiri_id == $cladire->id)? "selected": "" }}>{{ $cladire->nume }}</option>
                            @endforeach
                        </select>                                    
                    </div>
                </div>   

                <div class="form-group">
                    <h5> Etaj <span class="text-danger">*</span></h5>
                    <div class="controls">
                        <input type="text" value="{{ $apartamente->etaj }}" name="etaj" class="form-control" required="">
                    </div>
                </div>

                <div class="form-group">
                    <h5> Numar <span class="text-danger">*</span></h5>
                    <div class="controls">
                        <input type="text" name="numar" value="{{ $apartamente->numar }}" class="form-control" required="">
                    </div>
                </div>

                <div class="form-group">
                    <h5> Suprafata <span class="text-danger">*</span></h5>
                    <div class="controls">
                        <input type="text" name="suprafata"  value="{{ $apartamente->suprafata }}" class="form-control" required="">
                    </div>
                </div>

                <div class="form-group">
                    <h5> Numar de Camere <span class="text-danger">*</span></h5>
                    <div class="controls">
                        <input type="text" name="numar_camere" @error('numar_camere') is-invalid @enderror value="{{$apartamente->numar_camere}}" class="form-control" required="">
                        @error('numar_camere')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>
                </div>

                <div class="form-check ">
                    <label><h5>Vedere la mare</h5></label><br>
                    <input type="checkbox" name="vedere" {{ ($apartamente->vedere == 1)? 'checked' : '' }}  class="form-check-input float-md-right ">Da<br>                                                               
                </div>

                {{-- <div class="form-group">
                    <h5>Proprietar: </h5>
                    <div class="controls">
                        <select name="proprietari_id" class="form-control">
                            @foreach($proprietari as $proprietar)
                                <option value="{{ $proprietar->id }}"  {{ ($apartamente->proprietar_id == $proprietar->id)? "selected": "" }}>{{ $proprietar->nume }}</option>
                            @endforeach
                        </select>                                    
                    </div>
                </div>    --}}

                <div class="form-group">
                    <label for='proprietari_id'>Category</label>
                    <select id="proprietari_id" class="custom-select @error('proprietari_id') is-invalid @enderror" autocomplete="proprietari_id" autofocus name="proprietari_id">
                        @foreach ($proprietari as $proprietar)
                            <option value="{{ $proprietar->id }}" {{ old('proprietari_id', $apartamente->proprietari_id) == $proprietar->id?'selected':''}}>{{ $proprietar->nume }}</option>
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