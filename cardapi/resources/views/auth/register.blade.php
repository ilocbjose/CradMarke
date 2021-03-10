
@extends('app')
@section('Collection', 'Card')
@section('content')

<script>
    document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('select');
    var instances = M.FormSelect.init(elems);
  });
</script>
<br>
<br>
    <div class="row purple darken-1">
        <br>
     <form method="POST" action="http://127.0.0.1:90/CradMarke/cardapi/public/api/register">

      @CSRF

      <h2>Register Screen</h2>
      <div class="row">
        <div class="input-field col s12">
          <input placeholder="Name" name="name" type="text" class="validate" >
          <label for="name">Name</label>
        </div>
        <div class="input-field col s12">
          <input placeholder="Password"  name="password" type="password" class="validate">
          <label for="password">Password</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <input placeholder="Re-password"  name="password_confirmation" type="password" class="validate">
          <label for=">repassword">Repeat Password</label>
        </div>
      </div>
      <div class="row">
          <div class="input-field col s12">
            <select  placeholder="Role" name="role">
                <option value="" disabled selected>Choose your option</option>
                <option value="client">Client</option>
                <option value="seller">Seller</option>
            </select>
        <label>Role Select</label>
        </div>
      </div> 
      <div class="row">
        <div class="input-field col s12">
          <input placeholder="Email"  name="email" type="email" class="validate">
          <label for="email">Email</label>
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
        <a href="http://127.0.0.1:90/CradMarke/cardapi/public/login" class="waves-effect waves-light btn-large"><i class="keyboard_arrow_left"></i>Login</a>
        </center>
    </div>
    <div class="col s6">
        <center>
        <a href="http://127.0.0.1:90/CradMarke/cardapi/public/forgot_password" class="waves-effect waves-light btn-large"><i class="keyboard_arrow_right"></i>Forgot</a>
        </center>
    </div>
  </div>
@endsection