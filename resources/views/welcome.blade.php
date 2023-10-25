<!-- Importa o layout main para essa view -->
@extends('layouts.main')

<!-- Altera o title do layout -->
@section('title', 'UniFlare - Veja os eventos ao seu redor')

<!-- Inclui o conteúdo do layout -->
@section('content')

<h1>home</h1>
<img src="/img/banner.jpg" alt="Imagem Banner">

@foreach($events as $event)
    <p>{{ $event->title }} -- {{ $event->description }} -- {{ $event->city }}</p>
@endforeach

@endsection
