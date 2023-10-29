<!-- Importa o layout main para essa view -->
@extends('layouts.main')

<!-- Altera o title do layout -->
@section('title', 'UniFlare - Seus eventos')

<!-- Inclui o conteúdo do layout -->
@section('content')

<div class="col-md-10 offset-md-1 dashboard-title-container">
    <h1>Meus eventos</h1>
</div>
<div class="col-md-10 offset-md-1 dashboard-events-container">
    @if(count($events) > 0)



    @else
        <p>Você ainda não possui eventos, <a href="/events/create">crie aqui.</a></p>
    @endif
</div>


@endsection
