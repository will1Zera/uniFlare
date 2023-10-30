<!-- Importa o layout main para essa view -->
@extends('layouts.main')

<!-- Altera o title do layout -->
@section('title', 'UniFlare - Edite seu evento')

<!-- Inclui o conteúdo do layout -->
@section('content')

<div id="event-create-container" class="col-md-6 offset-md-3">
    <h1>Edite o seu evento</h1>
    <!-- Formulário para editar um evento -->
    <form action="/events/update/{{ $event->id }}" method="POST" enctype="multipart/form-data">
        <!-- Incluindo diretiva de proteção csrf do blade no form -->
        @csrf
        @method('PUT')
        <div class="form-group">
            <img src="/img/events/{{ $event->image }}" alt="Imagem do evento" class="img-preview">
            <label for="image">Imagem do evento</label>
            <input type="file" id="image" name="image" class="form-control-file">
        </div>
        <div class="form-group">
            <label for="title">Evento</label>
            <input type="text" class="form-control" id="title" name="title" placeholder="Digite o nome do evento" value="{{ $event->title }}">
        </div>
        <div class="form-group">
            <label for="date">Data do evento</label>
            <input type="date" class="form-control" id="date" name="date" value="{{date('Y-m-d', strtotime($event->date));}}">
        </div>
        <div class="form-group">
            <label for="city">Cidade</label>
            <input type="text" class="form-control" id="city" name="city" placeholder="Digite o local do evento" value="{{ $event->city }}">
        </div>
        <div class="form-group">
            <label for="private">O evento é privado?</label>
            <select name="private" id="private" class="form-control">
                <option value="0">Não</option>
                <option value="1" {{ $event->private == 1 ? "selected='selected'" : "" }}>Sim</option>
            </select>
        </div>
        <div class="form-group">
            <label for="description">Descrição</label>
            <textarea name="description" id="description" class="form-control" placeholder="Digite a descrição do evento">{{ $event->description }}</textarea>
        </div>
        <div class="form-group">
            <label for="items">Infraestrutura do evento</label>
            <div class="form-group">
                <input type="checkbox" name="items[]" value="Cadeiras" {{ (in_array("Cadeiras", $event->items)) ? "checked='checked'"  :  ''}}> Cadeiras
            </div>
            <div class="form-group">
                <input type="checkbox" name="items[]" value="Palco" {{ (in_array("Palco", $event->items)) ? "checked='checked'"  :  ''}}> Palco
            </div>
            <div class="form-group">
                <input type="checkbox" name="items[]" value="Bebidas" {{ (in_array("Bebidas", $event->items)) ? "checked='checked'"  :  ''}}> Bebidas
            </div>
            <div class="form-group">
                <input type="checkbox" name="items[]" value="Alimentos" {{ (in_array("Alimentos", $event->items)) ? "checked='checked'"  :  ''}}> Alimentos
            </div>
            <div class="form-group">
                <input type="checkbox" name="items[]" value="Brindes" {{ (in_array("Brindes", $event->items)) ? "checked='checked'"  :  ''}}> Brindes
            </div>
        </div>
        <input type="submit" class="btn btn-primary" value="Atualizar evento">
    </form>
</div>


@endsection
