@extends('template.base')

@section('titulo', 'Listado de Noticias')

@section('contenido')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="h3">Últimas Noticias</h1>
    <a href="{{ route('noticias.create') }}" class="btn btn-primary">Nueva Noticia</a>
</div>

@forelse($noticias as $noticia)
    <article class="card mb-4 shadow-sm">
        <div class="card-body">
            <h2 class="card-title h4">{{ $noticia->titulo }}</h2>
            <div class="text-muted fst-italic mb-2">
                Publicado hace {{ $noticia->created_at->diffForHumans() }} | {{ $noticia->comentarios_count }} comentarios
            </div>
            <p class="card-text">{{ Str::limit($noticia->texto, 200) }}</p>
            
            <div class="d-flex justify-content-between align-items-center mt-3">
                <a class="btn btn-outline-primary btn-sm" href="{{ route('noticias.show', $noticia) }}">Leer más →</a>

                <div class="btn-group">
                    @if($noticia->esEditable())
                        <a href="{{ route('noticias.edit', $noticia) }}" class="btn btn-outline-warning btn-sm">Editar</a>
                    @endif

                    @if($noticia->esEliminable())
                        <form action="{{ route('noticias.destroy', $noticia) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-danger btn-sm" onclick="return confirm('¿Seguro que deseas eliminar esta noticia?')">Borrar</button>
                        </form>
                    @endif
                </div>
            </div>
        </div>
    </article>
@empty
    <div class="alert alert-info">No hay noticias publicadas todavía.</div>
@endforelse
@endsection