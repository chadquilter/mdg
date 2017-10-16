@extends('layouts.front')

@section('content')
	<div class="row">
		<br>
		<div class="col-md-6">
			<div class="image_display_r">
				<img class="img-fluid" alt="A scenic home image" src="/images/mdg_images/IMG_TILE2.JPG" style="max-height:450%; width: 100%; display: block;">
				<div class="image_display_text_container">
					<p>Our work is a cut above the rest!</p>
				</div>
			</div>
		</div>
		<div class="col-md-6">
			<div class="image_display_r">
				<img class="img-fluid" alt="A scenic home image" src="/images/mdg_images/IMG_SHOWER1.JPG" style="max-height:450%; width: 100%; display: block;">
				<div class="image_display_text_container">
					<p>Our work is a cut above the rest!</p>
				</div>
			</div>
		</div>
	</div>
	<br>
	<div class="well">
		<div class="service-text">
			<h1>{{$title}}</h1>
			@if(count($services) > 0)
			<ul>
				@foreach($services as $service)
					<li>{{$service}}</li>
				@endforeach
			</ul>
			@endif
		</div>
		<br>
		<div class="row">
			<div class="col-md-6">
				<div class="image_display_r">
					<img class="img-fluid" alt="A scenic home image" src="/images/mdg_images/IMG_BEDROOM1.JPG" style="max-height:450%; width: 100%; display: block;">
					<div class="image_display_text_container">
						<p>Our work is a cut above the rest!</p>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="image_display_r">
					<img class="img-fluid" alt="A scenic home image" src="/images/mdg_images/IMG_BEDROOM1A.JPG" style="max-height:450%; width: 100%; display: block;">
					<div class="image_display_text_container">
						<p>Our work is a cut above the rest!</p>
					</div>
				</div>
			</div>
		</div>
		<br>
	</div>
@endsection
