@extends("layouts.mainud6")

@section("content")

    <div class="container">
        <h2>Editar Mensaje</h2>
        <hr>

        <form action="{{ route('messages.update',$message->id) }}" method="POST">
            {{ method_field('PUT') }}
            {{ csrf_field() }}
            <div class="form-group row">
                <label for="to" class="col-form-label col-sm-2" >To</label>
                <div class="col-sm-6">
                    <input id="to" name="to" class="form-control" value="{{$message->userto->email}}" readonly="readonly">
                </div>

            </div>
            <div class="form-group row">
                <label for="message" class="col-form-label col-sm-2" >About</label>
                <div class="col-sm-6">
                    <input id="about" name="about" class="form-control{{ $errors->has('to') ? ' is-invalid' : '' }}" value="{{$message->about}}">
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
                    <textarea id="message" name="message" class="form-control{{ $errors->has('message') ? ' is-invalid' : '' }}" rows="5">{{$message->message}}</textarea>
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
                    <input id="link" name="link" class="form-control{{ $errors->has('link') ? ' is-invalid' : '' }}" value="{{$message->link}}">
                    @if ($errors->has('link'))
                        <div class="invalid-feedback">
                            <strong>{{ $errors->first('link') }}</strong>
                        </div>
                    @endif
                </div>
            </div>
            <button type="submit" class="btn btn-primary topButtonProfile">
                Modificar Mensaje
            </button>
        </form>
    </div>

@endsection
