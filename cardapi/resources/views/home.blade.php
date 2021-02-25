@extends('app')
@section('Collection', 'Card')
@section('content')
<div class="row">
    <div class="col s6 container">
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
    <div class="col s6 container">
        <div class="panel panel-default">
            <div class="card-panel purple darken-1">
                <h3>Colecciones</h3>
            </div>
            @if ($collections->isEmpty())
                <div>No hay colecciones</div>
            @else
                <table class="responsive-table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>File_path</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($collections as $collection)
                        
                            <tr>
                                <td>{!! $collection->name !!}</td>
                                <td>{!! $collection->file_path !!}</td>
                                <td>{!! $collection->date !!}</td>
                            </tr>

                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
</div>
<div class="row">
	<div class="col s12 container">
        <div class="panel panel-default">
            <div class="card-panel purple darken-1">
                <h3>Ventas</h3>
            </div>
            @if ($sells->isEmpty())
                <div>No hay cartas disponibles a la venta</div>
            @else
                <table class="responsive-table">
                    <thead>
                        <tr>
                            <th>ID Card</th>
                            <th>Amount</th>
                            <th>ID User</th>
                            <th>Price</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($sells as $sell)
                        
                            <tr>
                                <td>{!! $sell->id_card !!}</td>
                                <td>{!! $sell->amount !!}</td>
                                <td>{!! $sell->id_user !!}</td>
                                <td>{!! $sell->price !!}</td>
                            </tr>

                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
</div>
@endsection