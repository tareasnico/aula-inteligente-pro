@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Crear Nueva Aula</div>

                <div class="card-body">
                    {{-- Mostrar errores de validación --}}
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('aulas.store') }}" method="POST">
                        @csrf  {{-- Token de seguridad de Laravel --}}

                        <div class="mb-3">
                            <label for="nombre" class="form-label">Nombre del Aula</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" value="{{ old('nombre') }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="ubicacion" class="form-label">Ubicación</label>
                            <input type="text" class="form-control" id="ubicacion" name="ubicacion" value="{{ old('ubicacion') }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="capacidad" class="form-label">Capacidad</label>
                            <input type="number" class="form-control" id="capacidad" name="capacidad" value="{{ old('capacidad') }}" required>
                        </div>

                        <div class="d-flex justify-content-end">
                            <a href="{{ route('aulas.index') }}" class="btn btn-secondary me-2">Cancelar</a>
                            <button type="submit" class="btn btn-primary">Guardar Aula</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection