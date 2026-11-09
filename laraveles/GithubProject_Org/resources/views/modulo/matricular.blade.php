@extends('template.base')

@section('content')
<h1>Matricular</h1>
<h1>{{ $modulo->nombre }} ({{ $modulo->abreviatura }})</h1>
<h2>Curso escolar: {{ $curso_escolar ?? 'sin definir' }}</h2>
<hr>
<div class="container">
    <div class="row">
        <div class="col-md-10 mx-auto">
            <form action="{{ route('matricula.storeAlumnos') }}" method="post">
                @csrf
                <input type="hidden" name="modulo_id" value="{{ $modulo->id }}">
                <table class="table table-hover">
                    @foreach($alumnos as $alumno)
                        <tr>
                            <td>
                                <input class="form-check-input" type="checkbox" value="{{ $alumno->id }}" name="alumno_id[]" @if(isset($matriculas[$alumno->id])) checked @endif>
                            </td>
                            <td>{{ $alumno->apellidos }}, {{ $alumno->nombre }}</td>
                        </tr>
                    @endforeach
                    <tr>
                        <td>&nbsp;</td>
                        <td>
                            <button class="btn btn-secondary" type="submit">Matricular</button>
                            <a href="{{ route('modulo.index') }}" class="btn btn-secondary">Volver</a>
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
</div>
<hr>
@endsection