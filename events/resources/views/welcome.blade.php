@extends('layouts.main')

@section('title', 'Ailton F. Eventos')

@section('content')
<body>
<h1 class='display-2'>EVENTOS</h1>
<hr>
<div id="search-container" class="com-md-12">
    <h2 class="display-4">Procure por eventos</h2>
    <form action="" class="form">
        <input type="text" class="form-control" id="search" name="search" placeholder="Procurar...">
    </form>
</div>
<hr>
<div class="col-md-12" id="events-container">
    <h4>Próximos eventos</h4>
    <p class="lead">clique em saber mais para mais informação!</p>
    <div class="row gap-1" id="cards-container">
        @foreach($events as $event)
            <div class="card col col-md-4">
                <img class="card-img-top" src="/img/events/{{ $event->image }}" alt="{{ $event->title }}" class="card-img">
                <div class="card-body">
                    <p class="card-date">20/10/2020</p>
                    <h4>{{ $event->title }}</h4>
                    <p class="lead">{{ $event->description }}</p>
                    <p class="lead card-participants">X Participantes</p>
                    <a href="/events/{{$event->id}}" class="text-decoration-none"><button class="btn btn-primary">Saber mais</button></a>
                </div>
            </div>
        @endforeach
    </div>
</div>
</body>
@endsection