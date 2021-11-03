@extends('layouts.main')

@section('title', 'Produtos')

@section('content')
    <h1 class="display-4">Página de Produtos</h1>
    @if($busca != '')
        <p class="lead">O usuário está buscando por {{$busca}}</p>
    @endif
@endsection
