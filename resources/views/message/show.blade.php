@extends("layouts.mainud6")

@section("content")

    <div class="container">
        <h2>Ver Mensaje</h2>
        <hr>

        <form action="{{ route('messages.store') }}" method="POST">
            {{ csrf_field() }}
            <div class="form-group row">
                <label for="to" class="col-form-label col-sm-2" >From</label>
                <div class="col-sm-6">
                    <input id="to" name="to" class="form-control" value="{{$message->userto->name}}" readonly="readonly">
                </div>

            </div>
            <div class="form-group row">
                <label for="message" class="col-form-label col-sm-2" >About</label>
                <div class="col-sm-6">
                    <input id="about" name="about"  value="{{$message->about}}" readonly="readonly">
                </div>
            </div>
            <div class="form-group row">
                <label for="message_inicial" class="col-form-label col-sm-2" >Mensaje</label>
                <div class="col-sm-6">
                    <textarea id="message_inicial" name="message_inicial" class="form-control" readonly="readonly">{{$message->message}}</textarea>
                </div>
            </div>
             <div class="form-group row">
                <label for="message" class="col-form-label col-sm-2" >Link</label>
                <div class="col-sm-6">
                    <a id="link" name="link"  href="{{$message->link}}">{{$message->link}}</a>
                </div>
            </div>
            @if (true)
              <a href="{{route('messages')}}" class="btn btn-primary active" role="button">Volver</a>
            @else
              <div class="form-group row">
                  <label for="message" class="col-form-label col-sm-2" >Respuesta</label>
                  <div class="col-sm-6">
                      <textarea id="message" name="message" class="form-control" rows="5"></textarea>
                  </div>
              </div>
              <button type="submit" class="btn btn-primary topButtonProfile">
                  Responder
              </button>
          @endif
        </form>
    </div>

@endsection
