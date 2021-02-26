@extends('app')
@section('content')
<div class="row">
    <div class="col s12 container">
        <div class="panel panel-default">
            <div class="card-panel purple darken-1">
                <h3>User</h3>
            </div>
                <table class="striped">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>{!! $user->name !!}</td>
                                <td>{!! $user->email !!}</td>
                                <td>{!! $user->role !!}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
        </div>
    </div>
</div>
<div class="row">   
    <div class="col s6">
        <form action="http://127.0.0.1:90/CradMarke/cardapi/public/api/logout" method="GET">
            <center>
                <button class="btn waves-effect waves-light" name="send" value="Submit" type="submit">
                    Logout
                </button>
            </center>
        </form>
    </div>
</div>
@endsection