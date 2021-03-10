@extends('app')
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<br>
<br>
    <div class="row purple darken-1">
    <form method="POST" action="http://127.0.0.1:90/CradMarke/cardapi/public/api/login" class="col s12">
        @CSRF
        <h2>Login Screen</h2>
      <div class="row">
        <div class="input-field col s12">
          <input  placeholder="Email"  name="email" type="email" class="validate">
          <label for="email">Email</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <input placeholder="Password"  name="password" type="password" class="validate">
          <label for="password">Password</label>
        </div>
      </div>
            <center>
        <button class="btn waves-effect waves-light" name="send" value="Submit" type="submit">Submit
            <i class="material-icons right">send</i>
        </button>
            </center>
    </form>
  </div>
  <br>
  <br>

  <div class="row row purple darken-1">
        <div class="col s6">
            <center>
            <a href="http://127.0.0.1:90/CradMarke/cardapi/public/register" class="waves-effect waves-light btn-large"><i class="keyboard_arrow_left"></i>Register</a>
            </center>
        </div>
        <div class="col s6">
            <center>
            <a href="http://127.0.0.1:90/CradMarke/cardapi/public/forgot_password" class="waves-effect waves-light btn-large"><i class="keyboard_arrow_right"></i>Forgot</a>
            </center>
        </div>
    </div>
  </div>
@endsection