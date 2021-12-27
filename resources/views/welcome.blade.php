@extends('layouts.main'){{-- vou extender o layout do main.blade --}}

@section('title', 'HDC Eventos')

@section('content')
    
    <div id="search-container" class="col-md-12">
        <h1>Busque um evento</h1>
        <form action="/" action="GET">
            <input type="text" id="search" name="search" class="form-control" placeholder="Procurar...">
        </form>
    </div>
    <div id="events-container" class="col-md-12">
        @if ($search)
            <h2>Buscando por: {{ $search }}</h2>
        @else
            <h2>Próximos Eventos</h2>
            <p class="subtitle">Veja os eventos dos próximos dias</p>
        @endif

        @if (count($events) == 0 && $search)
            <p class="information">Não foi possível encontrar nenhum evento com: {{ $search }}! <a href="/"> Ver todos</a></p>
        @elseif (count($events) == 0)
            <p class="information">Não há eventos disponíveis</p>
        @endif

        <div id="cards-container" class="row">
            @foreach ($events as $event)
                <div class="card col-md-3">
                    <img src="/img/events/{{ $event->image }}" alt="{{ $event->title}}">
                    <div class="card-bordy">
                        <p class="card-date">{{ date('d/m/y',strtotime($event->date)) }}</p>
                        <h5 class="card-title">{{ $event->title }}</h5>
                        <p class="card-participants">{{count($event->users)}} Participantes</p>
                        <a href="/events/{{ $event->id }}" class="btn btn-primary">Saber Mais</a>
                    </div>
                </div>
            @endforeach
            
        </div>
    </div>
@endsection