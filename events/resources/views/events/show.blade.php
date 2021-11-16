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
            <ion-icon name="star-outline"></ion-icon> Event Owner
        </p>
        <p class="lead">
            <ion-icon name="calendar-outline"></ion-icon> Data do evento: {{ $event->date }}
        </p>
        <p class="lead">
            <ion-icon name="location-outline"></ion-icon> {{ $event->city }}
        </p>
        <p class="lead">
            <ion-icon name="people-outline"></ion-icon> X participantes
        </p>
        <buttom class="btn btn-primary mt-2" type="submit">Confirmar presença</buttom>
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