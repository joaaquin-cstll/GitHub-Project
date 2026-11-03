@extends('template.base')

@section('titulo', $noticia->titulo)

@section('contenido')
<article class="mb-4">
    <header class="mb-4">
        <h1 class="fw-bolder mb-1">{{ $noticia->titulo }}</h1>
        <div class="text-muted fst-italic mb-2">
            Publicado hace {{ $noticia->created_at->diffForHumans() }}
        </div>
    </header>

    <section class="mb-4">
        <p class="fs-5 mb-4" style="white-space: pre-line;">{{ $noticia->texto }}</p>
    </section>

    <!-- Botones de Acción para la Noticia -->
    <div class="d-flex gap-2 border-top pt-3 mb-5">
        @if($noticia->esEditable())
            <a href="{{ route('noticias.edit', $noticia) }}" class="btn btn-warning btn-sm">
                Editar (quedan {{ round(20 - $noticia->created_at->diffInMinutes(now())) }} min) <!-- Muestra el tiempo restante para editar la noticia -->
            </a>
        @endif

        @if($noticia->esEliminable())
            <form action="{{ route('noticias.destroy', $noticia) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Deseas eliminar esta noticia?')">Eliminar Noticia</button>
            </form>
        @endif
    </div>
</article>

<!-- Sección de Comentarios -->
<section class="mb-5">
    <h3 class="h4 mb-3">Comentarios ({{ $noticia->comentarios->count() }})</h3>
    
    <div class="card bg-light">
        <div class="card-body">
            <!-- Formulario para Nuevo Comentario -->
            <form action="{{ route('comentarios.store', $noticia) }}" method="POST" class="mb-4">
                @csrf
                <div class="mb-3">
                    <textarea name="mensaje" class="form-control" rows="3" placeholder="Escribe un comentario..." required></textarea>
                </div>
                <div class="row align-items-center">
                    <div class="col-auto">
                        <label for="valoracion" class="form-label mb-0">Valoración:</label>
                    </div>
                    <div class="col-auto">
                        <select name="valoracion" id="valoracion" class="form-select form-select-sm" required>
                            <option value="positivo">Positivo 👍</option>
                            <option value="negativo">Negativo 👎</option>
                        </select>
                    </div>
                    <div class="col-auto">
                        <button type="submit" class="btn btn-primary btn-sm">Publicar Comentario</button>
                    </div>
                </div>
            </form>

            <hr class="my-4">

            <!-- Listado de Comentarios Existentes -->
            @forelse($noticia->comentarios as $comentario)
                <div class="d-flex mb-4 p-3 bg-white rounded border shadow-sm">
                    <div class="flex-shrink-0">
                        <span class="badge {{ $comentario->valoracion === 'positivo' ? 'bg-success' : 'bg-danger' }} fs-6">
                            {{ ucfirst($comentario->valoracion) }}
                        </span>
                    </div>
                    <div class="ms-3 w-100">
                        <div class="d-flex justify-content-between align-items-center mb-1">
                            <span class="fw-bold">Usuario</span>
                            <small class="text-muted">{{ $comentario->created_at->diffForHumans() }}</small>
                        </div>
                        <p class="mb-2">{{ $comentario->mensaje }}</p>

                        <!-- Botones de Acción para Comentarios -->
                        <div class="d-flex gap-2 justify-content-end align-items-center">
                            {{-- Botón y Modal de Edición (< 5 min) --}}
                            @if($comentario->esEditable())
                                <button type="button" class="btn btn-outline-warning btn-sm py-0" style="font-size: 0.75rem;" data-bs-toggle="modal" data-bs-target="#editModal{{ $comentario->id }}">
                                    Editar (< 5 min)
                                </button>

                                <div class="modal fade" id="editModal{{ $comentario->id }}" tabindex="-1" aria-labelledby="editModalLabel{{ $comentario->id }}" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <form action="{{ route('comentarios.update', $comentario) }}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="editModalLabel{{ $comentario->id }}">Editar Comentario</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body text-start">
                                                    <div class="mb-3">
                                                        <label for="mensaje{{ $comentario->id }}" class="form-label">Mensaje</label>
                                                        <textarea name="mensaje" id="mensaje{{ $comentario->id }}" class="form-control" rows="3" required>{{ old('mensaje', $comentario->mensaje) }}</textarea>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="valoracion{{ $comentario->id }}" class="form-label">Valoración</label>
                                                        <select name="valoracion" id="valoracion{{ $comentario->id }}" class="form-select" required>
                                                            <option value="positivo" {{ $comentario->valoracion === 'positivo' ? 'selected' : '' }}>Positivo 👍</option>
                                                            <option value="negativo" {{ $comentario->valoracion === 'negativo' ? 'selected' : '' }}>Negativo 👎</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Cancelar</button>
                                                    <button type="submit" class="btn btn-warning btn-sm">Actualizar</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @endif

                            {{-- Botón de Eliminación (< 3 min) --}}
                            @if($comentario->esEliminable())
                                <form action="{{ route('comentarios.destroy', $comentario) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline-danger btn-sm py-0" style="font-size: 0.75rem;" onclick="return confirm('¿Deseas borrar este comentario?')">
                                        Borrar (< 3 min)
                                    </button>
                                </form>
                            @endif
                        </div>
                    </div>
                </div>
            @empty
                <p class="text-muted text-center my-3">No hay comentarios aún. ¡Sé el primero en comentar!</p>
            @endforelse
        </div>
    </div>
</section>
@endsection