@extends('layout')

@section('content')
    <h1 class="font-bold text-2xl">Cards</h1>
    <div class="cards">
        @foreach($cards as $card)
            <x-card :card="$card"/>
        @endforeach
    </div>
@stop
