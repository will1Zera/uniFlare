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
            <p class="events-participants"><ion-icon name="people"></ion-icon> {{ count($event->users) }} participante</p>
            <p class="event-owner"><ion-icon name="star"></ion-icon> {{ $eventOwner['name'] }}</p>
            @if(!$hasUserJoined)
                <form action="/events/join/{{ $event->id }}" method="POST">
                    @csrf
                    <a href="/events/join/{{ $event->id }}" class="btn btn-primary" id="event-submit" onclick="event.preventDefault();
                        this.closest('form').submit();">
                        Confirmar presença
                    </a>
                </form>
            @else
                <p>Você já está participando deste evento</p>
            @endif
            <h3>O evento conta com:</h3>
            <ul id="items-list">
                @foreach($event->items as $item)
                    <li><span><ion-icon name="checkmark"></ion-icon> {{ $item }}</span></li>
                @endforeach
            </ul>
        </div>
        <div class="col-md-12" id="description-container">
            <h3>Descrição do evento:</h3>
            <p class="event-description">{{ $event->description }}</p>
        </div>
    </div>
</div>


@endsection
