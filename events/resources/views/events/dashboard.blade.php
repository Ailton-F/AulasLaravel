@extends('layouts.main')

@section('title', 'Dashboard')

@section('content')
<div class="col-md-10 offset-md-1 dashboard-title-container">
    <h1 class="display-2">Meus eventos</h1>
</div>
<hr>
<div class="col-md-10 offset-md-1 dashboard-events-container container">
    @if(count($events) > 0)
        <table class="table table-light">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Participantes</th>
                    <th scope="col" colspan="2">Ações</th>
                </tr>
            </thead>
            <tbody >
                @foreach($events as $event)
                    <tr>
                        <td scope="row">{{ $loop->index + 1 }}</td>
                        <td scope="row"><a class="text-decoration-none" href="/events/{{ $event->id }}">{{$event->title}}</a></td>
                        <td scope="row">{{count($event->users)}}</td>
                        <td scope="row"><a class="btn btn-info edit-btn" href="/events/edit/{{$event->id}}">
                            <ion-icon name="create-outline"></ion-icon> Editar</a>
                        </td>
                        <td scope="row">
                            <form action="/events/{{$event->id}}" method="POST">
                            @csrf
                            @method('DELETE')
                                <button type="submit" class="btn btn-danger">
                                    <ion-icon name="trash-outline"></ion-icon> Deletar
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <h2 class="display-4">Você não tem eventos</h2>
        <small>Crise seu evento <a href="/events/create">Aqui</a></small>
    @endif
</div>
<!-- EVENTOS QUE O USER PARTICIPA -->
<div class="col-md-10 offset-md-1 dashboard-title-container">
    <h1 class="display-2">Eventos que participo</h1>
</div>
<hr>
<div class="col-md-10 offset-md-1 dashboard-events-container container">
    @if(count($eventparticipant) > 0)
        <table class="table table-light">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Participantes</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody >
                @foreach($eventparticipant as $eventpart)
                    <tr>
                        <td scope="row">{{ $loop->index + 1 }}</td>
                        <td scope="row"><a class="text-decoration-none" href="/events/{{ $event->id }}">{{$event->title}}</a></td>
                        <td scope="row">{{count($event->users)}}</td>
                        <td scope="row">
                            <form action="/events/unjoin/{{$event->id}}" method="POST">
                            @csrf
                            @method('DELETE')
                                <button type="submit" class="btn btn-danger">
                                    <ion-icon name="trash-outline"></ion-icon> Remover presença
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <h2 class="display-4">Você não participa de nenhum evento</h2>
        <small>Increnva-se em um <a href="/">Aqui</a></small>
    @endif
</div>
@endsection