@extends('layouts.front')

@section('content')
	<div class="image_display_r">
		<img class="image_for_display" style="width=100%;" alt="A scenic home image" src="/images/6_orig.jpg">
		<div class="image_display_text_container">
			<p>Our work is a cut above the rest!</p>
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
						CKEDITOR.replace( 'article-ckeditor' );
				</script>
	</div>
@endsection
