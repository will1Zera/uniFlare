<!-- Importa o layout main para essa view -->
@extends('layouts.main')

<!-- Altera o title do layout -->
@section('title', 'UniFlare - Crie um evento')

<!-- Inclui o conteúdo do layout -->
@section('content')

<div id="event-create-container" class="col-md-6 offset-md-3">
    <h1>Crie o seu evento</h1>
    <!-- Formulário para criar um novo evento -->
    <form action="/events" method="POST" enctype="multipart/form-data">
        <!-- Incluindo diretiva de proteção csrf do blade no form -->
        @csrf
        <div class="form-group">
            <label for="image">Imagem do evento</label>
            <input type="file" id="image" name="image" class="form-control-file">
        </div>
        <div class="form-group">
            <label for="title">Evento</label>
            <input type="text" class="form-control" id="title" name="title" placeholder="Digite o nome do evento">
        </div>
        <div class="form-group">
            <label for="date">Data do evento</label>
            <input type="date" class="form-control" id="date" name="date">
        </div>
        <div class="form-group">
            <label for="city">Cidade</label>
            <input type="text" class="form-control" id="city" name="city" placeholder="Digite o local do evento">
        </div>
        <div class="form-group">
            <label for="private">O evento é privado?</label>
            <select name="private" id="private" class="form-control">
                <option value="0">Não</option>
                <option value="1">Sim</option>
            </select>
        </div>
        <div class="form-group">
            <label for="description">Descrição</label>
            <textarea name="description" id="description" class="form-control" placeholder="Digite a descrição do evento"></textarea>
        </div>
        <div class="form-group">
            <label for="items">Infraestrutura do evento</label>
            <div class="form-group">
                <input type="checkbox" name="items[]" value="Cadeiras"> Cadeiras
            </div>
            <div class="form-group">
                <input type="checkbox" name="items[]" value="Palco"> Palco
            </div>
            <div class="form-group">
                <input type="checkbox" name="items[]" value="Bebidas"> Bebidas
            </div>
            <div class="form-group">
                <input type="checkbox" name="items[]" value="Alimentos"> Alimentos
            </div>
            <div class="form-group">
                <input type="checkbox" name="items[]" value="Brindes"> Brindes
            </div>
        </div>
        <input type="submit" class="btn btn-primary" value="Criar evento">
    </form>
</div>


@endsection
