@extends('template.base')
@section('content')
<h1>Matricular</h1>
<h1>{{ $alumno->nombre }} {{ $alumno->apellidos }}</h1>
<hr>
<div class="container">
    <div class="row">
        <div class="col-md-6 mx-auto">
            <form action="{{ route('matricula.storeModules') }}" method="post">
                @csrf
                <input type="hidden" name="alumno_id" value="{{ $alumno->id }}">
                <table class="table table-hover">
                    @foreach($modulosCompletos as $modulo)
                    <tr>
                        <td><input class="form-check-input" type="checkbox" value="m{{ $modulo->id }}" name="modulo_id[]" @if(isset($matriculas[$modulo->id])) checked @endif></td>
                        <td>{{ $modulo->nombre }}</td>
                        <td>{{ $modulo->apellidos }}</td>
                        <td>{{ $modulo->horas }} h</td>
                        <td>{{ $modulo->creditos }}</td>
                    </tr>
                    @endforeach
                    <tr>
                        <td colspan="4">&nbsp;</td>
                        <td><button class="btn btn-secondary" type="submit">Matricular</button></td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
</div>
<hr>
<!--  Metodo pilar -->
<div class="container">
    <div class="row">
        <div class="col-md-6 mx-auto">
            <h2>Curso Escolar: {{ $curso_escolar ?? 'sin definir' }}</h2>
            <! con el ?? '' puedes poner el mensaje si no existe curso_escolar->
                <form action="{{ route('matricula.store') }}" method="post">
                    @csrf
                    <input type="hidden" name="alumno_id" value="{{ $alumno->id }}">
                    <div class="mb-3">
                        <label for="modulo_id" class="form-label">Modulo en el que se matricula</label>
                        <select name="modulo_id" id="modulo_id" class="form-select">
                            <option value="" selected disabled>Selecciona un Módulo</option>
                            @foreach($modulos as $index => $modulo)
                            <option value="{{ $index }}">{{ $modulo }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button class="btn btn-secondary" type="submit">Matricular</button>
                </form>
        </div>
    </div>
</div>
<hr>
<!--  Metodo Ruta -->
<div class="container">
    <div class="row">
        <div class="col-md-6 mx-auto">
            <h2>Curso Escolar: {{ $curso_escolar ?? 'sin definir' }}</h2>
            <! con el ?? '' puedes poner el mensaje si no existe curso_escolar->
                <form action="{{ route('matricula.make', $alumno) }}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="modulo_id" class="form-label">Modulo en el que se matricula</label>
                        <select name="modulo_id" id="modulo_id" class="form-select">
                            <option value="" selected disabled>Selecciona un Módulo</option>
                            @foreach($modulos as $index => $modulo)
                            <option value="{{ $index }}">{{ $modulo }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button class="btn btn-secondary" type="submit">Matricular</button>
                </form>
        </div>
    </div>
</div>
<hr>
@endsection