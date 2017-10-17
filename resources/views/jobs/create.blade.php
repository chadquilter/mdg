@extends('layouts.app')


@section('content')
  <div class="container">
    <h1>Create Job</h1>
    {!! Form::open(['action' => 'JobsController@store', 'method' => 'POST', 'enctype' => 'multipart/data']) !!}
    <div class="form=group">
        {{Form::label('job_title', 'Title:')}}
        {{Form::text('job_title', '', ['class' => 'form-control', 'placeholder' => 'Title'])}}
    </div>
    <div class="form=group">
        {{Form::label('job_summary', 'Summary:')}}
        {{Form::textarea('job_summary', '', ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'Job Summary'])}}
    </div>
    <div class="form=group">
        {{Form::label('job_notes', 'Notes:')}}
        {{Form::text('job_notes', '', ['class' => 'form-control', 'placeholder' => 'Additional Job Notes'])}}
    </div>
    <div class="form=group">
      {{Form::label('job_type', 'Job Type:')}}
      <br>
      @if(count($job_types) > 0)
        @foreach($job_types as $job_id => $job_name)
          {{Form::checkbox('job_type', $job_id, ['class' => 'form-control'])}} {{$job_name}} &nbsp
        @endforeach
      @else
      <h1>No Types Listed!</h1>
      @endif
    </div>
    @if (count($job_option_types) > 0)
      <div class="form=group">
        @foreach ($job_option_types as $job_option_id => $job_option_name)
          {{Form::label($job_option_id, $job_option_name)}}
          <br>
          @if(count($bool_types) > 0)
            @foreach($bool_types as $bool_id => $bool_name)
              {{Form::radio($job_option_id, $bool_id, ['class' => 'form-control'])}} {{$bool_name}}
            @endforeach
          @else
            <h1>No Types Listed!</h1>
          @endif
          <br>
        @endforeach
      </div>
    @endif
    <br>
    @if (count($users) > 0)
      <div class="form=group">
        {{Form::label('job_created_by', 'Job Created by:')}}
        @if(count($users) > 0)
          {{ Form::select('job_created_by', $users, $current_user, ['class' => 'form-control m-bot15']) }}
        @else
          <h1>No Users Listed!</h1>
        @endif
      </div>
    @endif
    <br>
    <div class="page-buttons">
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
