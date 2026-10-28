@extends('template.base')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 mx-auto">
                <table class="table table-hover">
                    @foreach($matriculas as $matricula)
                        <tr>
                            <td>{{ $matricula->id }}</td>
                            <td>
                                {{ $matricula->alumno->nombre }}
                                {{ $matricula->alumno->apellido }}
                            </td>
                            <td>
                                {{ $matricula->alumno->nombre }}
                                {{ $matricula->alumno->abreviatura }}

                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection
