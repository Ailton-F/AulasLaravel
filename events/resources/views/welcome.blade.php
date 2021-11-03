@extends('layouts.main')

@section('title', 'Ailton F. Eventos')

@section('content')
    <body>
        <h1>Algum título</h1>
        {{--Posso usar os comandos do php, tais como IF, FOR e FOREACH--}}
        @if(10 > 5)
        <p>A condição é verdadeira(true)</p>
        @endif

        @if($nome == 'Ailton')
        <p>Seu nome é {{$nome}}, ele tem {{$idade}}, trabalha como {{$profissao}}</p>
        @else
        <p>Seu nome não é {{$nome}}</p>
        @endif

        @foreach($arr as $nome)
        <p class="lead">{{$nome}}, {{$loop->index}}</p> {{--Com $loop->index eu consigo ter acesso ao index do loop foreach--}}
        @endforeach

        @for($i = 0; $i < count($arr); $i++) @if($arr[$i]=='Ailton' ) <p>Item: {{ $arr[$i] }}, Ele quem fez! <br> Índice: {{ $i }}</p>
            @else
            <p>Item: {{ $arr[$i] }} <br> Índice: {{ $i }}</p>
            @endif
        @endfor
</body>
@endsection