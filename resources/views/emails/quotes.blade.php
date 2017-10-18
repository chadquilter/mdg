<div>
  <h1>Quote Recieved:</h1>
  <hr>
  <div>
    <strong>Title: </strong> {{ $quoteTitle }}
    <br>
    <h2>Date: {{ $quoteDate }}</h2>
    <br>
    <strong>Phone: </strong> {{ $quotePhone }}
    <br>
    <strong>Email: </strong> {{ $quoteEmail }}
  </div>
  <br>
  <div>
    <strong>Description: </strong>
    <hr>
    {!! $quoteDescription !!}
  </div>
  <hr>
  <div>
    <strong>Notes: </strong> {{ $quoteNotes }}
  </div>
</div>
