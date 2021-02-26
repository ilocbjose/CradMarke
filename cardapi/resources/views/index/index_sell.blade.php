@extends('app')
@section('Collection', 'Card')
@section('content')
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
                            <th>ID User</th>
                            <th>Amount</th>
                            <th>Price</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($sells as $sell)
                        
                            <tr>
                                <td>{!! $sell->id_card !!}</td>
                                <td>{!! $sell->id_user !!}</td>
                                <td>{!! $sell->amount !!}</td>
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