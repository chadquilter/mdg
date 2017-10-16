@extends('layouts.front')


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
		{!! Form::open(['action' => 'JobsController@store', 'method' => 'POST', 'enctype' => 'multipart/data']) !!}
			<div class="form=group">
					{{Form::label('quote_title', 'Quote Title:')}}
					{{Form::text('quote_title', '', ['class' => 'form-control', 'placeholder' => 'Quote Title'])}}
			</div>
			<div id="app-6" class="form=group">
					{{Form::label('quote_phone', 'Phone:')}}
					{{Form::text('quote_phone', '', ['class' => 'form-control', 'placeholder' => 'Phone'])}}
			</div>
			<div class="form=group">
					{{Form::label('quote_email', 'Email:')}}
					{{Form::text('quote_email', '', ['class' => 'form-control', 'placeholder' => 'Email'])}}
			</div>
			<div class="form=group">
					{{Form::label('job_summary', 'Summary:')}}
					{{Form::textarea('job_summary', 'Quote Summary Here...', ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'Summary'])}}
			</div>
			<div class="form=group">
					{{Form::label('quote_notes', 'Quote Notes:')}}
					{{Form::text('quote_notes', '', ['class' => 'form-control', 'placeholder' => 'Quote Additional Notes'])}}
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
		<br>
	</div>
</div>
@endsection
