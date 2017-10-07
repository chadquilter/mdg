@extends('layouts.front')

@section('content')
<style>
div.image_display {
width: 640px;
box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
text-align: center;
}

div.image_display_r {
  width: 886px;
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
  text-align: center;
}

div.image_display_text_container {
  padding: 10px;
  background-color: white;
}
</style>
    <div class="image_display_r">
      <img class="image_for_display" style="width=100%;" alt="A scenic home image" src="/images/6_orig.jpg">
      <div class="image_display_text_container">
        <p>Our work is a cut above the rest!</p>
      </div>
    </div>
    </br>
    <div class="container">
    <h1>{{$title}}</h1>
    <p>
      Cut above Construction has helped thousands of happy homeowners across Texas build the new custom-designed home of their dreams.
      We build "eco-friendly" green custom homes of all sizes for all budgets. Whatever custom home you have in mind, from a quaint cottage in Austin,
      a rambling farm house in the Hill Country or an elegant luxury estate home in Houston, Dallas or San Antonio, we can build, repair, or add to it at an affordable price.
      </br>
      As a Texas custom home builder for over 10 years, we have made thousands of happy customers' dream home a reality by delivering on that promise.
      We would love to help you! For a free custom design meeting, contact us today. Let's get started on your new, custom dream home or new addition now!
    </p>
    </br>
    <div class="image_display">
      <img class="image_for_display" style="width=100%;" alt="A scenic home image" src="/images/scenic-home.jpg">
      <div class="image_display_text_container">
        <p>Our work is a cut above the rest!</p>
      </div>
    </div>
    </br>
@endsection
