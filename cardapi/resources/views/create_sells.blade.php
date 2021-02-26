@extends('app')
@section('content')
<br><br>
<div class="row purple darken-1">
        
    <form method="POST" action="http://127.0.0.1:90/CradMarke/cardapi/public/api/sells" class="col s12">
      @CSRF
        <h2>Create Sell</h2>
      <div class="row">
        <div class="input-field col s12">
          <input  placeholder="ID Card"  name="id_card" type="text" class="validate">
          <label for="id_card">ID Card</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <input placeholder="Amount" name="amount" type="text" class="validate">
          <label for="amount">Amount</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <input  placeholder="Price"  name="price" type="text" class="validate">
          <label for="price">Price</label>
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

@endsection