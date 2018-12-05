@extends('layouts.mainud6')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Perfil</div>
                <div class="card-body">
                    @if(!isset($editable))
                        <b>Nombre:</b> {{ Auth::user()->name }}<br>
                        <b>Email:</b> {{ Auth::user()->email }}<br>
                        <b>Fecha de creacion:</b> {{ Auth::user()->created_at->format('d/m/Y') }}<br>
                        <a href="?editable=true">Editar</a>
                    @else
                        <form action="{{ route('cambiarPerfil') }}" method="get">
                            <input type="text" name="id" value="{{ Auth::user()->id }}" hidden>
                            <b>Nombre:</b> <input type="text" name="nombre" value="{{ Auth::user()->name }}"><br>
                            <b>Email:</b> <input type="text" name="email" value="{{ Auth::user()->email }}"><br>
                            <input type="submit" value="Cambiar"> <a href="/perfil">Cancelar</a>
                        </form>
                    @endif
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
