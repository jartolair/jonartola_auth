@extends("layouts.mainud6")

@section("content")

    <div class="container">
        <h2>Enviar Mensaje</h2>
        <hr>
        @if(isset($noExiste))
        <b>Ese usuario no existe</b>
        @endif
        <form action="{{ route('messages.store') }}" method="POST">
            {{ method_field('PUT') }}
            {{ csrf_field() }}
            <div class="form-group row">
                <label for="to" class="col-form-label col-sm-2" >To (email)</label>
                <div class="col-sm-6">
                    <input id="to" name="to" class="form-control{{ $errors->has('to') ? ' is-invalid' : '' }}" value="{{old('to')}}">
                    @if ($errors->has('to'))
                        <div class="invalid-feedback">
                            <strong>{{ $errors->first('to') }}</strong>
                        </div>
                    @endif
                </div>

            </div>.
            <div class="form-group row">
                <label for="message" class="col-form-label col-sm-2" >About</label>
                <div class="col-sm-6">
                    <input id="about" name="about" class="form-control{{ $errors->has('about') ? ' is-invalid' : '' }}" value="{{old('about')}}">
                    @if ($errors->has('about'))
                        <div class="invalid-feedback">
                            <strong>{{ $errors->first('about') }}</strong>
                        </div>
                    @endif
                </div>
            </div>
            <div class="form-group row">
                <label for="message" class="col-form-label col-sm-2" >Mensaje</label>
                <div class="col-sm-6">
                    <textarea id="message" name="message" class="form-control{{ $errors->has('message') ? ' is-invalid' : '' }}" rows="5">{{old('message')}}</textarea>
                    @if ($errors->has('message'))
                        <div class="invalid-feedback">
                            <strong>{{ $errors->first('message') }}</strong>
                        </div>
                    @endif
                </div>
            </div>
            <div class="form-group row">
                <label for="message" class="col-form-label col-sm-2" >Link (optional)</label>
                <div class="col-sm-6">
                    <input id="link" name="link" class="form-control{{ $errors->has('link') ? ' is-invalid' : '' }}" value="{{old('link')}}">
                    @if ($errors->has('link'))
                        <div class="invalid-feedback">
                            <strong>{{ $errors->first('link') }}</strong>
                        </div>
                    @endif
                </div>
            </div>
            <button type="submit" class="btn btn-primary topButtonProfile">
                Enviar Mensaje
            </button>
        </form>
    </div>

@endsection
