@extends('layouts.app')


@section('content')
  <div class="container">
  	<div class="row">
  		<br>
  		<div class="col-md-6">
  			<div class="image_display_r">
  				<img class="img-fluid" alt="A scenic home image" src="/images/mdg_images/IMG_BATHROOM2.JPG" style="max-height:450%; width: 100%; display: block;">
  				<div class="image_display_text_container">
  					<p>Our work is a cut above the rest!</p>
  				</div>
  			</div>
  		</div>
  		<div class="col-md-6">
  			<div class="image_display_r">
  				<img class="img-fluid" alt="A scenic home image" src="/images/mdg_images/IMG_F1F2_1.JPG" style="max-height:450%; width: 100%; display: block;">
  				<div class="image_display_text_container">
  					<p>Our work is a cut above the rest!</p>
  				</div>
  			</div>
  		</div>
  	</div>
  	<br>
  	<div class="well">
  		<h1>Create a Quote:</h1>
  		{!! Form::open(['action' => 'QuotesController@store', 'method' => 'POST', 'enctype' => 'multipart/data']) !!}
  			<div class="form=group">
  					{{Form::label('title', 'Name:')}}
  					{{Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'Name'])}}
  			</div>
  			<div id="app-6" class="form=group">
  					{{Form::label('phone', 'Phone:')}}
  					{{Form::text('phone', '', ['class' => 'form-control', 'placeholder' => 'Phone'])}}
  			</div>
  			<div class="form=group">
  					{{Form::label('email', 'Email:')}}
  					{{Form::text('email', '', ['class' => 'form-control', 'placeholder' => 'Email'])}}
  			</div>
  			<div class="form=group">
  					{{Form::label('description', 'Description:')}}
  					{{Form::textarea('description', '', ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'Quote Description'])}}
  			</div>
        <br>
  			<div class="form=group">
  					{{Form::label('notes', 'Notes:')}}
  					{{Form::text('notes', '', ['class' => 'form-control', 'placeholder' => 'Additional Notes'])}}
  			</div>
  			<br>
  			<div class="form=group">
  				{{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
  			</div>
  		{!! Form::close() !!}
  		<script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
  		<script>
  				CKEDITOR.replace( 'article-ckeditor' );
  		</script>
  	</div>
  	<br>
  	<div class="image_display_r">
  		<img class="img-fluid"  alt="A scenic home image" src="/images/3_orig.jpg" style="max-height:450%; width: 100%; display: block;">
  		<div class="image_display_text_container">
  			<p>Custom Design!</p>
  		</div>
  	</div>
  	<br>
  </div>
@endsection
