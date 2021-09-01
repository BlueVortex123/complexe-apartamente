@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h1>Complexe</h1>
                    <div class="float-right">
                        <a href="{{ route('complexe.create') }}" class="btn btn-success">Introducere nou Complex</a>
                    </div>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nume</th>
                                    <th>Adresa</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    @foreach($complexe as $key => $complex )
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $complex->nume }}</td>
                                    <td>{{ $complex->adresa }}</td>
                                    <td width="25%">
                                        <a href="{{ route('complexe.edit' , $complex->id) }}" class="btn btn-primary">Edit</a>
                                        <a href="{{ route('complexe.show' , $complex->id) }}" class="btn btn-info">Show</a>
                                        
                                        <form action="{{ route('complexe.destroy', $complex) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>                                    
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <a href="{{ route('trashed_complex') }}" class="btn btn-secondary float-right">Trash</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection()