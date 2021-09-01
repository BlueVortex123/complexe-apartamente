@extends('layouts.app')

@section('content')

<div class="container">
    <h3>Complexe sterse temporar</h3>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <table class="table">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Complexe</th>
                        <th scope="col">Sterse la data de:</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($complexe as $complex)
                        <tr>
                            <th scope="row">{{ $complex->id }}</th>
                            <td>{{ $complex->nume }}</td>
                            <td>{{ $complex->deleted_at->diffForHumans() }}</td>
                            <td>
                                <a href="{{ route('restore_complex', $complex) }}" class="btn btn-success">Restaurare</a>
                            </td>
                            <td>
                                <a href="{{ route('permanently_delete_complex', $complex) }}" class="btn btn-danger">Stergere Permanenta</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <a href="{{ route('complexe.index') }}" class="btn btn-outline-secondary">Inapoi</a>
        </div>
    </div>
</div>




@endsection