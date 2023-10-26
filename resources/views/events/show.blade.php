<!-- Importa o layout main para essa view -->
@extends('layouts.main')

<!-- Altera o title do layout -->
@section('title', 'UniFlare - Informações sobre o evento')

<!-- Inclui o conteúdo do layout -->
@section('content')

<div class="col-md-10 offset-md-1">
    <div class="row">
        <div id="image-container" class="col-md-6">
            <img src="/img/events/{{ $event->image }}" class="img-fluid" alt="{{ $event->title }}">
        </div>
        <div class="cold-md-6" id="info-container">
            <h1>{{ $event->title }}</h1>
            <p class="event-city"><ion-icon name="pin"></ion-icon> {{ $event->city }}</p>
            <p class="events-participants"><ion-icon name="people"></ion-icon> -- participantes</p>
            <p class="event-owner"><ion-icon name="star"></ion-icon> fulano deltrano</p>
            <a href="#" class="btn btn-primary" id="event-submit">Confirmar presença</a>
        </div>
        <div class="col-md-12" id="description-container">
            <h3>Descrição do evento:</h3>
            <p class="event-description">{{ $event->description }}</p>
        </div>
    </div>
</div>


@endsection
