@extends('template.base')

@section('titulo', 'Editar Noticia')

@section('contenido')
<div class="card shadow-sm mb-4">
    <div class="card-header bg-warning text-dark">
        <h2 class="h5 mb-0">Editar Noticia</h2>
    </div>
    <div class="card-body">
        <form action="{{ route('noticias.update', $noticia) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="mb-3">
                <label for="titulo" class="form-label">Título</label>
                <input type="text" name="titulo" id="titulo" class="form-control" value="{{ old('titulo', $noticia->titulo) }}" required>
            </div>

            <div class="mb-3">
                <label for="texto" class="form-label">Texto de la noticia</label>
                <textarea name="texto" id="texto" class="form-control" rows="8" required>{{ old('texto', $noticia->texto) }}</textarea>
            </div>

            <button type="submit" class="btn btn-warning">Actualizar Noticia</button>
            <a href="{{ route('noticias.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</div>
@endsection