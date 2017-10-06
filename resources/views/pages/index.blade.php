@extends('layouts.front')

@section('content')
<style>
div.image_display {
width: 640px;
box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
text-align: center;
}

div.image_display_text_container {
padding: 10px;
}
</style>
    <div class="image_display">
      <img class="image_for_display" style="width=100%;" alt="A scenic home image" src="/images/scenic-home.jpg">
      <div class="image_display_text_container">
        <p>A cut above!</p>
      </div>
    </div>
    <h1>{{$title}}</h1>
    <p>This is the main page</p>
	   <p>
	      <a class="btn btn-primary btn-lg" href="/login" role="button">Login</a>
		    <a class="btn btn-success btn-lg" href="/register" role="button">Register</a>
	   </p>
  </div>
@endsection
