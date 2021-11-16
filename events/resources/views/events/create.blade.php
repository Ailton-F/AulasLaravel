@extends('layouts.main')

@section('title', 'Produto')

@section('content')
<div id="event-create-container" class="col-md-6 offset-md-3">
    <h1 class='display-2'>Crie um evento</h1>
    <form action="/events" method="POST" enctype="multipart/form-data">   
        @csrf
        <div class="form-group mt-4">
            <label for="image">Evento:</label>
            <input name="image" id="image" type="file" class="filme">
        </div> 
        <div class="form-group mt-4">
            <label for="title">Título do evento:</label>
            <input name="title" id="title" type="text" class="form-control">
        </div>
        <div class="form-group mt-4">
            <label for="date">Data do evento:</label>
            <input name="date" id="date" type="date" class="form-control">
        </div>
        <div class="form-group mt-4">
            <label for="desc">Descrição:</label>
            <textarea name="desc" id="desc" type="text" class="form-control"></textarea>
        </div>
        <div class="form-group mt-4">
            <label for="title" class="lead">Adicione itens de infraestrutura</label>
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
            <input name="city" id="city" type="text" class="form-control">
        </div>
        <div class="form-group mt-4">
            <label for="private">Privado:</label>
            <select class="form-select" id="private" name="private">
                <option value="0">Não</option>
                <option value="1">Sim</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary mt-4">Cadastrar evento</button>
    </form>
</div>
@endsection