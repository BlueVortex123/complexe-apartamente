@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h1>Cladiri</h1>
                    <div class="float-right">
                        <a href="{{ route('cladiri.create') }}" class="btn btn-success">Introducere cladire noua</a>
                    </div>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Numele Complexului</th>
                                    <th>Nume Bloc</th>
                                    <th>Numar de Etaje</th>
                                    <th>Numar de Apartamente</th>
                                    <th width="20%">Actiune</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    @foreach($cladiri as $key => $cladire )
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $cladire->complex->nume }}</td>
                                    <td>{{ $cladire->nume }}</td>
                                    <td>{{ $cladire->numar_etaje }}</td>
                                    <td>
                                        -
                                    </td>
                                    <td>
                                        <a href="{{ route('cladiri.edit' , $cladire->id) }}" class="btn btn-primary ">Edit</a>
                                        <a href="{{ route('cladiri.show' , $cladire->id) }}" class="btn btn-info">Show</a>
                                        <form action="{{ route('cladiri.destroy', $cladire) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>                                    
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <a href="{{ route('trashed_cladiri') }}" class="btn btn-secondary float-right">Trash</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection()