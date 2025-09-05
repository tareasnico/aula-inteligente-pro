@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
               <div class="card-header">
    <div class="d-flex justify-content-between align-items-center">
        <span>Listado de Aulas</span>
        <a href="{{ route('aulas.create') }}" class="btn btn-primary btn-sm">Crear Nueva Aula</a>
    </div>
</div>

                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif

                    <table class="table table-striped table-hover">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Ubicación</th>
                                <th scope="col">Capacidad</th>
                                <th scope="col">Estado</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($aulas as $aula)
                                <tr>
                                    <th scope="row">{{ $aula->id }}</th>
                                    <td>{{ $aula->nombre }}</td>
                                    <td>{{ $aula->ubicacion }}</td>
                                    <td>{{ $aula->capacidad }} personas</td>
                                    <td>
                                        <span class="badge bg-success">{{ $aula->estado }}</span>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center">No hay aulas registradas.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection