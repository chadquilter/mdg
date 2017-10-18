<div>
  <h1>Quote Recieved:</h1>
  <hr>
  <div>
    <strong>Title: </strong> {{ $quoteTitle }}
    <br>
    <string>Date: </strong> {{ $quoteDate }}
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
