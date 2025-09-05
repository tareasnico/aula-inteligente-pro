@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Editar Docente</div>
                <div class="card-body">
                    <form action="{{ route('docentes.update', $docente) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="nombre" class="form-label">Nombre Completo</label>
                            <input type="text" class="form-control" name="nombre" id="nombre" value="{{ old('nombre', $docente->nombre) }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="especialidad" class="form-label">Especialidad</label>
                            <input type="text" class="form-control" name="especialidad" id="especialidad" value="{{ old('especialidad', $docente->especialidad) }}" required>
                        </div>
                        <div class="text-end">
                            <a href="{{ route('docentes.index') }}" class="btn btn-secondary">Cancelar</a>
                            <button type="submit" class="btn btn-primary">Actualizar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection