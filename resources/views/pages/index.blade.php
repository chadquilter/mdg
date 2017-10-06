@extends('layouts.front')

@section('content')
    <div>
      <img style="width=100%;" src="/images/scenic-home.jpg">
    </div>
    <h1>{{$title}}</h1>
    <p>This is the main page</p>
	   <p>
	      <a class="btn btn-primary btn-lg" href="/login" role="button">Login</a>
		    <a class="btn btn-success btn-lg" href="/register" role="button">Register</a>
	   </p>
  </div>
@endsection
