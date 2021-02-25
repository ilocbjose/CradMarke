@extends('app')
@section('Collection', 'Card')
@section('content')
<br>
<br><br><br><br><br>
    <div class="row purple darken-1">
        <div class="container">
            <form class="col s12" action="api/password/reset" method="POST">
                <h2>Forgot Password?</h2>

                <input name="email" placeholder="Enter email" value="{{request()->get('email')}}">
                <input name="password" placeholder="Enter new password">
                <input name="password_confirmation" placeholder="Confirm new password">
                <input hidden name="token" placeholder="token" value="{{request()->get('token')}}">

                <br><br>

                <center>
                    <button class="btn waves-effect waves-light" type="submit" name="action">Submit
                        <i class="material-icons right">send</i>
                    </button>
                </center>
            </form>
            <br>
            <br>
        </div>
    </div>
@endsection