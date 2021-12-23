@extends('layouts.main'){{-- vou entender o layout do main.blade --}}

@section('title', 'Criar Eventos')

@section('content')

<div id="event-create-container" class="col-md-6 offset-md-3">
    <h1>Crie o seu evento</h1>
    <form action="/events" method="POST" enctype="multipart/form-data">
      @csrf
      <div class="form-group">
        <label for="image">Imagem do Evento:</label>
        <input type="file" id="image" name="image" class="from-control-file">
      </div>
      <div class="form-group">
        <label for="title">Evento:</label>
        <input type="text" class="form-control" id="title" name="title" placeholder="Nome do evento">
      </div>
      <div class="form-group">
        <label for="title">Data do Evento:</label>
        <input type="date" class="form-control" id="date" name="date">
      </div>
      <div class="form-group">
        <label for="title">Cidade:</label>
        <input type="text" class="form-control" id="city" name="city" placeholder="Local do evento">
      </div>
      <div class="form-group">
        <label for="title">O evento é privado?</label>
        <select name="private" id="private" class="form-control">
          <option value="0">Não</option>
          <option value="1">Sim</option>
        </select>
      </div>
      <div class="form-group">
        <label for="title">Descrição:</label>
        <textarea name="description" id="description" class="form-control" placeholder="O que vai acontecer no evento?"></textarea>
      </div>
      {{--itens[] para saber que vai um ou mais itens--}}
      <div class="form-group">
        <label for="title">Adicione Itens de Infraestrutura:</label>
        <div class="form-group">
          <input type="checkbox" name="itens[]" value="Cadeiras">Cadeiras
        </div>
        <div class="form-group">
          <input type="checkbox" name="itens[]" value="Palco">Palco
        </div>
        <div class="form-group">
          <input type="checkbox" name="itens[]" value="Cerveja Gratis">Cerveja Grátis
        </div>
        <div class="form-group">
          <input type="checkbox" name="itens[]" value="Open Food">Open Food
        </div>
        <div class="form-group">
          <input type="checkbox" name="itens[]" value="Brindes">Brindes
        </div>
      </div>
      <input type="submit" class="btn btn-primary" id="event-submit" value="Criar Evento">
    </form>
  </div>
@endsection