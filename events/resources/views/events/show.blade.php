@extends('layouts.main')

@section('title', $event->title)

@section('content')
    <div id="event-create-container" class="show-content col-md-10 offset-md-1 offset-md-auto">
        <div class="row gap-2">
            <div id="image-container" class="col-md-6">
                <img src="/img/events/{{$event->image}}" class="img-event img-fluid" alt="{{$event->title}}">
            </div>
            <div id="info-container" class="col-md-6">
                <h1 class="display-2">{{$event->title}}</h1>
                <hr>
                <p class="lead mt-4">{{$event->description}}</p>
                <p class="events-participants lead"> <ion-icon name="people-outline"></ion-icon> X participantes</p>
                <p class="event-owner lead"><ion-icon name="star-outline"></ion-icon> Dono do evento</p>
                <small><ion-icon name="location"></ion-icon> {{$event->city}}</small><br>
                <small></small>
                <buttom class="btn btn-primary mt-2" type="submit">Confirmar presença</buttom>
            </div>
        </div>
    </div>
@endsection
