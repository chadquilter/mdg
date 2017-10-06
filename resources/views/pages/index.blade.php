@extends('layouts.app')

@section('content')

  <div class="fusion-fullwidth fullwidth-box fusion-fullwidth-1  fusion-parallax-fixed nonhundred-percent-fullwidth" style="border-color:#f6f6f6;border-bottom-width: 0px;border-top-width: 0px;border-bottom-style: solid;border-top-style: solid;padding-bottom:0px;padding-top:0px;padding-left:0px;padding-right:0px;background-attachment:fixed;background-color:#fff;background-position:center top;background-repeat:repeat-x;background-image: url(http://www.ahmanndesign.com/wp-content/uploads/2013/05/New-Sliders-Large1.jpg);"><style type="text/css" scoped="scoped">.fusion-fullwidth-1 {
                              padding-left: 0px !important;
                              padding-right: 0px !important;
                          }</style>
                          test test
  		<div class="tp-shadowcover" style="background-color: rgb(233, 233, 233); background-image: none;"></div>
    </div>
            <div class="jumbotron text-center">
                <h1>{{$title}}</h1>
                <p>This is the main page</p>
	            <p>
	                <a class="btn btn-primary btn-lg" href="/login" role="button">Login</a>
		            <a class="btn btn-success btn-lg" href="/register" role="button">Register</a>
	            </p>
            </div>

@endsection
