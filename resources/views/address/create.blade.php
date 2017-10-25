@extends('layouts.app')


@section('content')
  <br>
  <div class="well">
    <h1>Add New Address</h1>
    {!! Form::open(['action' => 'AddressController@store', 'method' => 'POST', 'enctype' => 'multipart/data']) !!}
    <div class="form=group">
        {{Form::label('address1', 'Address 1:')}}
        {{Form::text('address1', '', ['class' => 'form-control', 'placeholder' => 'Address 1'])}}
    </div>
    <div class="form=group">
        {{Form::label('address2', 'Address 2:')}}
        {{Form::text('address2', '', ['class' => 'form-control', 'placeholder' => 'Address 2'])}}
    </div>
    <div class="form=group">
        {{Form::label('city', 'City: ')}}
        {{Form::text('city', '', ['class' => 'form-control', 'placeholder' => 'City/Town'])}}
    </div>
    <div class="form=group">
        {{Form::label('state', 'State: ')}}
        {{Form::text('state', '', ['class' => 'form-control', 'placeholder' => 'State'])}}
    </div>
    <div class="form=group">
        {{Form::label('zipcode', 'Zip Code: ')}}
        {{Form::text('zipcode', '', ['class' => 'form-control', 'placeholder' => 'Zip Code'])}}
    </div>
    <div class="form=group">
        {{Form::label('Active', 'Address Active? ')}}
        {{Form::checkbox('active','1', ['class' => 'form-control'])}}
    </div>
    <br>
    <div class="page-buttons">
      {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
    </div>
    {!! Form::close() !!}
  </div>
  <br>
@endsection
