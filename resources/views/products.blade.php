@extends('layouts.main'){{-- vou entender o layout do main.blade --}}

@section('title', 'Produtos')

@section('content')
    {{--
    @if ($id != null)
        <p>Produto de id: {{ $id }}</p>

    @endif
    --}}
    @if ($busca != '')
        <p>O usuário está buscando: {{ $busca }}</p>
    @endif
    
@endsection