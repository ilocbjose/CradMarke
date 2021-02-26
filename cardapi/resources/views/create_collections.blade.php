@extends('app')
@section('content')
<br><br>
<div class="row purple darken-1">
        
    <form method="POST" action="http://127.0.0.1:90/CradMarke/cardapi/public/api/collection" class="col s12">
      @CSRF
        <h2>Create Collection</h2>
      <div class="row">
        <div class="input-field col s12">
          <input  placeholder="Name"  name="name" type="text" class="validate">
          <label for="name">Name</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <input placeholder="File Path" name="file_path" type="text" class="validate">
          <label for="file_path">File path</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <input  placeholder="Date"  name="date" type="text" class="validate">
          <label for="date">Date</label>
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