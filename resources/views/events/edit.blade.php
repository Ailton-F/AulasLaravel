@extends('layouts.main')

@section('title', 'Editando'.$event->title)

@section('content')
<div id="event-create-container" class="col-md-6 offset-md-3">
    <h1 class='display-2'>Editando {{$event->title}}</h1>
    <form action="/events/update/{{$event->id}}" method="POST" enctype="multipart/form-data">   
        @csrf
        @method('PUT')
        <div class="form-group mt-4">
            <label for="image">Img:</label>
            <input name="image" id="image" type="file" class="filme">
            <p class="lead mt-3">Imagem atual:</p>
            <img src="/img/events/{{$event->image}}" alt="{{$event->title}}" class="img-preview mt-2">
        </div> 
        <div class="form-group mt-4">
            <label for="title">Título do evento:</label>
            <input name="title" id="title" type="text" class="form-control" value="{{$event->title}}">
        </div>
        <div class="form-group mt-4">
            <label for="date">Nova data do evento:</label>
            <input name="date" id="date" type="date" class="form-control" value="{{ date('Y-m-d', strtotime($event->date)) }}">
        </div>
        <div class="form-group mt-4">
            <label for="description">Descrição:</label>
            <textarea name="description" id="description" type="text" class="form-control">{{$event->description}}</textarea>
        </div>
        <div class="form-group mt-4">
            <label for="title" class="lead">Atualize os itens de infraestrutura</label>
            <div class="form-group">
                <input type="checkbox" name="items[]" value="Cadeiras"> Cadeiras
            </div>
            <div class="form-group">
                <input type="checkbox" name="items[]" value="Palco"> Palco
            </div>
            <div class="form-group">
                <input type="checkbox" name="items[]" value="Open bar"> Open bar
            </div>
            <div class="form-group">
                <input type="checkbox" name="items[]" value="Open food"> Open food
            </div>
        </div>
        <div class="form-group mt-4">
            <label for="city">Cidade:</label>
            <input name="city" id="city" type="text" class="form-control" value="{{$event->city}}">
        </div>
        <div class="form-group mt-4">
            <label for="private">Privado:</label>
            <select class="form-select" id="private" name="private" >
                <option value="0">Não</option>
                <option value="1" {{ $event->private == 1 ? "selected='selected'" : ""}}> Sim</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary mt-4">Editar evento</button>
    </form>
</div>
@endsection