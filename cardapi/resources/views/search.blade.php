@extends('app')
@section('content')
<br><br>
<div class="row purple darken-1">
        
    <form method="GET" action="http://127.0.0.1:90/CradMarke/cardapi/public/api/searchCards" class="col s12">
      @CSRF
        <h2>Search box</h2>
      <div class="row">
        <div class="input-field col s12">
          <input  placeholder="Search"  name="id" type="text" class="validate">
          <label for="search">Busqueda</label>
        </div>
      </div>
            <center>
        <button class="btn waves-effect waves-light" name="send" value="Submit" type="submit">Search
            <i class="material-icons right">search</i>
        </button>
            </center>
    </form>
  </div>
  <br>
  <br>

@endsection