@extends('layouts.front')

@section('content')
	<h1>{{$title}}</h1>
	<div class="row">
		<br>
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
				<img class="img-fluid" alt="A scenic home image" src="/images/mdg_images/IMG_0041.JPG" style="max-height:450%; width: 100%; display: block;">
				<div class="image_display_text_container">
					<p>Our work is a cut above the rest!</p>
				</div>
			</div>
		</div>
	</div>
	<br>
	<div class="service-text well">
	@if(count($services) > 0)
		<ul>
		@foreach($services as $service)
			<li>{{$service}}</li>
		@endforeach
		</ul>
	@endif
	<div>
	<br>
	<div class="row">
		<br>
		<div class="col-md-6">
			<div class="image_display_r">
				<img class="img-fluid" alt="A scenic home image" src="/images/mdg_images/IMG_0027.JPG" style="max-height:450%; width: 100%; display: block;">
				<div class="image_display_text_container">
					<p>Our work is a cut above the rest!</p>
				</div>
			</div>
		</div>
		<div class="col-md-6">
			<div class="image_display_r">
				<img class="img-fluid" alt="A scenic home image" src="/images/mdg_images/IMG_0018.JPG" style="max-height:450%; width: 100%; display: block;">
				<div class="image_display_text_container">
					<p>Our work is a cut above the rest!</p>
				</div>
			</div>
		</div>
		<br>
	</div>
@endsection
