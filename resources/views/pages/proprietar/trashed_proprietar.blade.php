@extends('layouts.app')

@section('content')

<div class="container">
    <h3>Proprietari stersi temporar</h3>
    <div class="row justify-content-center mt-5">
        @if (count($proprietari))
            <div class="col-md-7">
                <div class="row">
                    <div class="table-responsive shadow">
                        <table class="table table-hover">
                            <thead class="shadow-sm" style="background-color: #dcdcdd">
                                <tr>
                                    <th scope="col">Proprietar Id#</th>
                                    <th scope="col">Proprietar Name</th>
                                    <th scope="col">Proprietar's Apartment#</th>
                                    <th scope="col">Proprietar Deleted At</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($proprietari as $proprietar)
                                    <tr>
                                        <th scope="row">{{ $proprietar->id }}</th>
                                        <td>{{ ucfirst($proprietar->nume) }}</td>
                                        <td>
                                           @forelse ($proprietar->apartamente as $apartament)
                                               <span class="badge badge-secondary">{{ $apartament->numar }}</span>
                                           @empty
                                                N/A
                                           @endforelse 
                                        </td>
                                        <td>{{ $proprietar->deleted_at->format('d M Y') }}</td>
                                        <td class="row mx-auto flex-nowrap">
                                            <a href="{{ route('restore_proprietar', $proprietar) }}" class="btn btn-success text-light btn-sm">Restore {{ $proprietar->nume }}
                                                {{-- <i class="fas fa-arrow-left"></i> --}}
                                            </a>
                                            <a href="{{ route('permanently_delete_proprietar', $proprietar) }}" class="btn btn-danger text-light btn-sm ml-1">Permanently Delete {{ $proprietar->nume }}
                                                {{-- <i class="fas fa-trash"></i> --}}
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                
            </div>
        @else
        <div class="col text-center">
            <p class="lead">No Trashed Owners!</p>
            <a href="{{ route('proprietari.index') }}" class="btn btn-secondary mr-1" title="Go to Owners Index">Inapoi</a>


        </div>
    @endif
</div>


@endsection