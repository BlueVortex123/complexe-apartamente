@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h1>Apartamente</h1>
                    <div class="float-right">
                        <a href="{{ route('apartamente.create') }}" class="btn btn-success">Introducere apartament nou</a>
                    </div>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Numele Cladirii</th>
                                    <th>Nume Proprietar</th>
                                    <th>Etaj</th>
                                    <th>Numar Apartament</th>
                                    <th>Suprafata m2</th>
                                    <th>Numar camere</th>
                                    <th>Vedere la mare</th>
                                    <th width="20%">Actiune</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    @foreach($apartamente as $key => $apartament )
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $apartament->cladire->nume }}</td>
                                    <td>
                                        @foreach ($proprietari as $proprietar)
                                            <span>{{ $proprietar->nume }}</span>
                                        @endforeach
                                    </td>
                                    <td>{{ $apartament->etaj }}</td>
                                    <td>{{ $apartament->numar }}</td>
                                    <td>{{ $apartament->suprafata }}</td>
                                    <td>{{ $apartament->numar_camere }}</td>
                                    <td>
                                        @if($apartament->vedere == '1')
                                            <span class=""></span>
                                            <input type="checkbox" checked="checked" value="1"  disabled>
                                        @else
                                        <input type="checkbox" value="0"  disabled>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('apartamente.edit' , $apartament->id) }}" class="btn btn-primary float-left">Edit</a>
                                        <form action="{{ route('apartamente.destroy', $apartament) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                            <button type="submit" class="btn btn-danger float-right">Delete</button>
                                        </form>                                    
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{-- <a href="{{ route('trashed_proprietar') }}" class="btn btn-secondary float-right">Trash</a> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection()