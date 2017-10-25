@extends('layouts.app')

@section('content')
  <br>
  <div class="well">
    <h1>Edit Job</h1>
    {!! Form::open(['action' => ['AddressController@update', $address->id], 'method' => 'POST']) !!}
    <div class="form=group">
        {{Form::label('address1', 'Address 1:')}}
        {{Form::text('address1', $address->address1, ['class' => 'form-control', 'placeholder' => 'Address 1'])}}
    </div>
    <div class="form=group">
        {{Form::label('address2', 'Address 2:')}}
        {{Form::text('address2',  $address->address2, ['class' => 'form-control', 'placeholder' => 'Address 2'])}}
    </div>
    <div class="form=group">
        {{Form::label('city', 'City: ')}}
        {{Form::text('city',  $address->city, ['class' => 'form-control', 'placeholder' => 'City/Town'])}}
    </div>
    <div class="form=group">
        {{Form::label('state', 'State: ')}}
        {{Form::text('state',  $address->state, ['class' => 'form-control', 'placeholder' => 'State'])}}
    </div>
    <div class="form=group">
        {{Form::label('zipcode', 'Zip Code: ')}}
        {{Form::text('zipcode',  $address->zipcode, ['class' => 'form-control', 'placeholder' => 'Zip Code'])}}
    </div>
    <div class="form=group">
        {{Form::label('Active', 'Address Active? ')}}
        {{Form::checkbox('active','1', ['class' => 'form-control'])}}
    </div>
    <div class="gmap_canvas">
      <iframe width="500" height="400" id="gmap_canvas" src="https://maps.google.com/maps?q={{$address->address1}},{{$address->city}},{{$address->state}},{{$address->zipcode}}=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
    </div>
    <style>.mapouter{overflow:hidden;height:500px;width:400px;}.gmap_canvas {background:none!important;height:500px;width:400px;}</style>

    <br>
    <div>
        {{Form::hidden('_method', 'PUT')}}
        {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
    </div>
    {!! Form::close() !!}
  </div>
  <br>
@endsection
