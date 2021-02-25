@extends('app')
@section('content')
<br><br><br>
<div class="row purple darken-1">
        
    <form method="POST" action="http://127.0.0.1:90/CradMarke/cardapi/public/api/cards" class="col s12">
      @CSRF
        <h2>Create Card</h2>
      <div class="row">
        <div class="input-field col s12">
          <input  placeholder="Name"  name="name" type="text" class="validate">
          <label for="name">Name</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <textarea placeholder="Description" name="description" class="materialize-textarea"></textarea>
          <label for="description">Description</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <input  placeholder="ID collection"  name="id_collection" type="text" class="validate">
          <label for="id_collection">ID collection</label>
        </div>
      </div>
    
            <center>
        <button class="btn waves-effect waves-light" type="submit" name="action">Submit
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