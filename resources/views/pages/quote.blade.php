@extends('layouts.front')


@section('content')
	<div class="row">
	<div class="col-md-6">
		<div class="image_display_r">
			<img class="img-fluid" alt="A scenic home image" src="/images/mdg_images/IMG_0033.JPG" style="max-height:450%; width: 100%; display: block;">
			<div class="image_display_text_container">
				<p>Our work is a cut above the rest!</p>
			</div>
		</div>
	</div>
	<div class="col-md-6">
		<div class="image_display_r">
			<img class="img-fluid" alt="A scenic home image" src="/images/mdg_images/IMG_0017.JPG" style="max-height:450%; width: 100%; display: block;">
			<div class="image_display_text_container">
				<p>Our work is a cut above the rest!</p>
			</div>
		</div>
	</div>
	</div>
	</br>
	<div class="container well">
		<h1>Create a Quote:</h1>
		{!! Form::open(['action' => 'JobsController@store', 'method' => 'POST', 'enctype' => 'multipart/data']) !!}
				<div class="form=group">
						{{Form::label('quote_title', 'Quote Title:')}}
						{{Form::text('quote_title', '', ['class' => 'form-control', 'placeholder' => 'Quote Title'])}}
				</div>
				<div id="app-6" class="form=group">
						{{Form::label('quote_phone', 'Phone:')}} {{ message }}
						{{Form::text('quote_phone', '', ['class' => 'form-control', 'placeholder' => 'Phone', 'v-model' => 'message'])}}
				</div>
				<div class="form=group">
						{{Form::label('quote_email', 'Email:')}}
						{{Form::text('quote_email', '', ['class' => 'form-control', 'placeholder' => 'Email'])}}
				</div>
				<div class="form=group">
						{{Form::label('quote_summary', 'Summary:')}}
						{{Form::textarea('quote_summary', '', ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'Quote Summary'])}}
				</div>
				<div class="form=group">
						{{Form::label('quote_notes', 'Quote Notes:')}}
						{{Form::text('quote_notes', '', ['class' => 'form-control', 'placeholder' => 'Quote Additional Notes'])}}
				</div>
				{{Form::submit('Submit', ['class=btn btn-primary'])}}
				{!! Form::close() !!}
				<script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
				<script>

				var app6 = new Vue({
					el: '#app-6',
						data: {
						message: 'Phone Number!'
					}
				})


						CKEDITOR.replace( 'article-ckeditor' );
				</script>
	</div>
@endsection
