@extends('layouts.main')

@section('title', 'Produto')

@section('content')
    @if($id != null)
        <p class="lead">Exibindo id do produto: {{$id}}</p>
    @else
        <p class="lead">Nenhum produto</p>
    @endif
@endsection