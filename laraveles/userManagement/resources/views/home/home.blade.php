@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    {{ __('You are logged in!') }}<br>
                    Id: {{ auth()->user()->id }}<br>
                    User: {{ auth()->user()->name }}<br>
                    Email: {{ auth()->user()->email }}<br>
                    Rol: {{ auth()->user()->rol }}<br>
                    <a href="{{ route('home.edit') }}">Editar</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
