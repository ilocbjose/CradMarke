@extends('app')
@section('Collection', 'Card')
@section('content')
<div class="row">
    <div class="col s12 container">
        <div class="panel panel-default">
            <div class="card-panel purple darken-1">
                <h3>Cartas</h3>
            </div>
            @if ($cards->isEmpty())
                <div>No hay cartas</div>
            @else
                <table class="responsive-table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Collection</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($cards as $card)
                            <tr>
                                <td>{!! $card->name !!}</td>
                                <td>{!! $card->description !!}</td>
                                <td>{!! $card->id_collection !!}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
</div>
@endsection