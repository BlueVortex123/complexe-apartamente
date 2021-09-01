@extends('layouts.app')

@section('content')

<div class="container">
    <h3>Proprietari sterse temporar</h3>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <table class="table">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Proprietari</th>
                        <th scope="col">Sters la data de:</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($proprietari as $proprietar)
                        <tr>
                            <th scope="row">{{ $proprietar->id }}</th>
                            <td>{{ $proprietar->nume }}</td>
                            <td>{{ $proprietar->deleted_at->diffForHumans() }}</td>
                            <td>
                                <a href="{{ route('restore_proprietar', $proprietar) }}" class="btn btn-success">Restaurare</a>
                            </td>
                            <td>
                                <a href="{{ route('permanently_delete_proprietar', $proprietar) }}" class="btn btn-danger">Stergere Permanenta</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <a href="{{ route('proprietari.index') }}" class="btn btn-outline-secondary">Inapoi</a>
        </div>
    </div>
</div>




@endsection