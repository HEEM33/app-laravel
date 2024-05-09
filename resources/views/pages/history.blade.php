@extends('layouts.app')

@section('title', 'Historique')

@section('content')
<div class="container">
    <h1>Historique des actions</h1>
    <div align="right"><a href="{{ url('/home') }}"  class="btn btn-primary mt-3">Retour</a></div>
    @if(count($history) > 0)
        <ul>
            @foreach($history as $record)
                <li>{{ $record->action }}</li>
            @endforeach
        </ul>
    @else
        <p>Aucun historique trouvé.</p>
    @endif
    
</div>

@endsection
