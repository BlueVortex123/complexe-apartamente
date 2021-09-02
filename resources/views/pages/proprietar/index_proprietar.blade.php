@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h1>Proprietari</h1>
                    <div class="float-right">
                        <a href="{{ route('proprietari.create') }}" class="btn btn-success">Introducere proprietar nou</a>
                    </div>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nume</th>
                                    <th>CNP</th>
                                    <th>Adresa</th>
                                    <th>Telefon</th>
                                    <th>Email</th>
                                    <th>Numar Apartament</th>
                                    <th width="20%">Actiune</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    @foreach($proprietari as $key => $proprietar )
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $proprietar->nume }}</td>
                                    <td>{{ $proprietar->CNP }}</td>
                                    <td>{{ $proprietar->adresa }}</td>
                                    <td>{{ $proprietar->telefon }}</td>
                                    <td>{{ $proprietar->email }}</td>
                                    <td>
                                        @foreach ($proprietar->apartamente as $apartament)
                                            <span>{{ $apartament->numar }}</span>
                                        @endforeach
                                    </td>
                                    <td>
                                        <a href="{{ route('proprietari.edit' , $proprietar->id) }}" class="btn btn-primary float-left">Edit</a>
                                        <form action="{{ route('proprietari.destroy', $proprietar) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                            <button type="submit" class="btn btn-danger float-right">Delete</button>
                                        </form>                                    
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <a href="{{ route('trashed_proprietar') }}" class="btn btn-secondary float-right">Trash</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection()