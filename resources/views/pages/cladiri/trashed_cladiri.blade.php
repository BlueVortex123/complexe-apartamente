@extends('layouts.app')

@section('content')

<div class="container">
    <h3>Cladiri sterse temporar</h3>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <table class="table">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Cladiri</th>
                        <th scope="col">Sterse la data de:</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cladiri as $cladire)
                        <tr>
                            <th scope="row">{{ $cladire->id }}</th>
                            <td>{{ $cladire->nume }}</td>
                            <td>{{ $cladire->deleted_at->diffForHumans() }}</td>
                            <td>
                                <a href="{{ route('restore_cladire', $cladire) }}" class="btn btn-success">Restaurare</a>
                            </td>
                            <td>
                                <a href="{{ route('permanently_delete_cladire', $cladire) }}" class="btn btn-danger">Stergere Permanenta</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <a href="{{ route('cladiri.index') }}" class="btn btn-outline-secondary">Inapoi</a>
        </div>
    </div>
</div>




@endsection