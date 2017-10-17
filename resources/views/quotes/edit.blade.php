@extends('layouts.app')

@section('content')
  <div class=container>
    <h1>Edit Job</h1>
    {!! Form::open(['action' => 'QuotesController@store', 'method' => 'POST', 'enctype' => 'multipart/data']) !!}
      <div class="form=group">
          {{Form::label('title', 'Title:')}}
          {{Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'Title'])}}
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
          {{Form::label('description', 'description:')}}
          {{Form::textarea('description', '', ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'Quote Description'])}}
      </div>
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
@endsection
