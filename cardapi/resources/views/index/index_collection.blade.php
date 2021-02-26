@extends('app')
@section('content')
<div class="row">
    <div class="col s12 container">
        <div class="panel panel-default">
            <div class="card-panel purple darken-1">
                <h3>Collections</h3>
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
@endsection