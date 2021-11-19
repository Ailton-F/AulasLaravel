@extends('layouts.main')

@section('title', 'Ailton F. Eventos')

@section('content')

<body>
    <h1 class='display-2'>EVENTOS</h1>
    <hr>
    <div id="search-container" class="com-md-12">
        @if($search)
        <h2 class="display-4">Procurando por '{{$search}}'</h2>
        @else
        <h2 class="display-4">Procure por eventos</h2>
        @endif
        <form action="/" method="GET" class="form">
            <div class="input-group">
                <div class="form-control">
                    <input placeholder="Título do evento" type="search" id="search" name="search">
                </div>
                <button type="submit" class="btn btn-primary">
                    <ion-icon name="search-outline"></ion-icon>
                </button>
            </div>
        </form>
    </div>
    <hr>
    <div class="col-md-12" id="events-container">
        @if(count($events) == 0 && $search)
            <p class="lead"><b>Não há eventos disponíveis com a busca '{{$search}}'</b></p>
        @elseif(count($events) == 0)
        <p class="lead"><b>Não há eventos disponíveis</b></p>
        @else
        <h4>Próximos eventos</h4>
        <p class="lead">clique em saber mais para mais informação!</p>
        <div class="row gap-1" id="cards-container">
            @foreach($events as $event)
            <div class="card col col-md-4">
                <img class="card-img-top" src="/img/events/{{ $event->image }}" alt="{{ $event->title }}" class="card-img">
                <div class="card-body">
                    <p class="card-date">{{ date('d/m/Y', strtotime($event->date)) }}</p>
                    <h4>{{ $event->title }}</h4>
                    <p class="lead">{{ $event->description }}</p>
                    <p class="lead card-participants">{{count($event->users)}} Participantes</p>
                    <a href="/events/{{$event->id}}" class="text-decoration-none"><button class="btn btn-primary">Saber mais</button></a>
                </div>
            </div>
            @endforeach
        @endif
        </div>
    </div>
</body>
@endsection