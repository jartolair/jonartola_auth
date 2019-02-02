@extends('layouts.mainud6')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                    <br>
                    Iniciaste sesion en {{Cookie::get('logueo')}}

                    <div>
                        <h3>Para guardar la session en la base de datos</h3>
                        <img src="cambio_env.png">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
