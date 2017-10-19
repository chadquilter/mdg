@extends('layouts.app')

@section('content')
  <br>
  <div class="well">
    <h1>Edit Quote</h1>
    {!! Form::open(['action' => ['QuotesController@update', $quote->id], 'method' => 'POST']) !!}
      <div class="form=group">
          {{Form::label('title', 'Title:')}}
          {{Form::text('title', $quote->title, ['class' => 'form-control', 'placeholder' => 'Title'])}}
      </div>
      <div id="app-6" class="form=group">
          {{Form::label('phone', 'Phone:')}}
          {{Form::text('phone', $quote->phone, ['class' => 'form-control', 'placeholder' => 'Phone'])}}
      </div>
      <div class="form=group">
          {{Form::label('email', 'Email:')}}
          {{Form::text('email', $quote->email, ['class' => 'form-control', 'placeholder' => 'Email'])}}
      </div>
      <div class="form=group">
          {{Form::label('description', 'description:')}}
          {{Form::textarea('description', $quote->description, ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'Quote Description'])}}
      </div>
      <div class="form=group">
          {{Form::label('notes', 'Notes:')}}
          {{Form::text('notes', $quote->notes, ['class' => 'form-control', 'placeholder' => 'Additional Notes'])}}
      </div>
      <br>
      <div class="form=group">
        {{Form::hidden('_method', 'PUT')}}
        {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
      </div>
    {!! Form::close() !!}
    <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'article-ckeditor' );
    </script>
  </div>
  <br>
@endsection
