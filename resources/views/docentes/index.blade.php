@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <span>Listado de Docentes</span>
                    <a href="{{ route('docentes.create') }}" class="btn btn-primary btn-sm">Nuevo Docente</a>
                </div>
                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">{{ session('success') }}</div>
                    @endif
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nombre</th>
                                <th>Especialidad</th>
                                <th class="text-end">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($docentes as $docente)
                                <tr>
                                    <td>{{ $docente->id }}</td>
                                    <td>{{ $docente->nombre }}</td>
                                    <td>{{ $docente->especialidad }}</td>
                                    <td class="text-end">
                                        <form action="{{ route('docentes.destroy', $docente) }}" method="POST">
                                            <a href="{{ route('docentes.edit', $docente) }}" class="btn btn-warning btn-sm">Editar</a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de que deseas eliminar este docente?')">Eliminar</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr><td colspan="4" class="text-center">No hay docentes registrados.</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection