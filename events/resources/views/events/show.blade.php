@extends('layouts.main')

@section('title', $event->title)

@section('content')
<div class="show-content">
    <img src="/img/events/{{$event->image}}" class="img-event img-fluid" alt="{{$event->title}}">
    <div class="container info-container">
        <h1 class="display-2">{{ $event->title }}</h1>
        <p class="lead">
            <ion-icon name="caret-forward-outline"></ion-icon> {{ $event->description }}
        </p>
        <p class="lead">
            <ion-icon name="star-outline"></ion-icon> {{$eventOwner['name']}}
        </p>
        <p class="lead">
            <ion-icon name="calendar-outline"></ion-icon> Data do evento: {{ date('d/m/Y', strtotime($event->date)) }}
        </p>
        <p class="lead">
            <ion-icon name="location-outline"></ion-icon> {{ $event->city }}
        </p>
        <p class="lead">
            <ion-icon name="people-outline"></ion-icon> {{count($event->users)}} participantes
        </p>
        @if(!$hasUserJoined)
        <form action="/event/join/{{$event->id}}" method="post">
            @csrf
            <button class="btn btn-primary mt-2" type="submit">
                <a href="/event/join/{{$event->id}}" class="text-decoration-none text-light" onclick="event.preventDefault();
               this.closest('form').submit();">
                    Confirmar presença
                </a>
            </button>
        </form>
        @else
            <p class="lead"> <ion-icon name="checkmark-done-outline"></ion-icon><b> Você já confirmou presença nesse evento</b></p>
        @endif
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary mt-2" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Ver detalhes de infraestrutura
        </button>
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Infraestrutura</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        @foreach($event->items as $item)
                        <p class="lead">
                            <ion-icon name="caret-forward-outline"></ion-icon> {{$item}}
                        </p>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection