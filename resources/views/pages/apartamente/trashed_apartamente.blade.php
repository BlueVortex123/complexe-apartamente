@extends('layouts.app')

@section('content')

<div class="container">
    <h3>Apartamente sterse temporar</h3>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <table class="table">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Apartament</th>
                        <th scope="col">Sters la data de:</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($apartamente as $apartament)
                        <tr>
                            <th scope="row">{{ $apartament->id }}</th>
                            <td>{{ $apartament->nume }}</td>
                            <td>{{ $apartament->deleted_at->diffForHumans() }}</td>
                            <td>
                                <a href="{{ route('restore_apartament', $apartament) }}" class="btn btn-success">Restaurare</a>
                            </td>
                            <td>
                                <a href="{{ route('permanently_delete_apartament', $apartament) }}" class="btn btn-danger">Stergere Permanenta</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <a href="{{ route('apartamente.index') }}" class="btn btn-outline-secondary">Inapoi</a>
        </div>
    </div>
</div>




@endsection