@extends('layouts.app')


@section('content')
  <script type="text/javascript" src="http://ianli.github.io/raphael-sketchpad/javascripts/raphael-2.0.1.js"></script>
  <script type="text/javascript" src="http://ianli.github.io/raphael-sketchpad/javascripts/json2.min.js"></script>
  <script type="text/javascript" src="http://ianli.github.io/raphael-sketchpad/src/raphael.sketchpad.js"></script>


    <h1>Create Job</h1>
    {!! Form::open(['action' => 'JobsController@store', 'method' => 'POST']) !!}
        <div class="form=group">
            {{Form::label('job_title', 'Title:')}}
            {{Form::text('job_title', '', ['class' => 'form-control', 'placeholder' => 'Title'])}}
        </div>
        <div class="form=group">
            {{Form::label('job_summary', 'Summary:')}}
            {{Form::textarea('job_summary', '', ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'Summary'])}}
        </div>
        <div class="form=group">
            {{Form::label('job_notes', 'Notes:')}}
            {{Form::text('job_notes', '', ['class' => 'form-control', 'placeholder' => 'Job Additional Notes'])}}
        </div>


        <div class="span-8">
          <h3>Editor</h3>
          <p>
            Draw a sketch below.
          </p>
          <div style="height:260px;" class="widget">
            <div id="sketchpad_editor"></div>
          </div>
        </div>

        <div class="span-8">
          <h3>Result</h3>
          <p>
            The sketch is stored as JSON in an input field.
          </p>
          <form action="" method="post" onsubmit="return false;">
            <textarea id="input1" name="input1" style="margin:0;width:250px;height:250px;"></textarea>
          </form>
        </div>

        <div class="span-8 last">
          <h3>Viewer</h3>
          <p>
            <a href="javascript:void(0);" id="update_sketchpad_viewer">Click</a>
            to display the JSON data in the viewer.
          </p>
          <div style="height:260px;" class="widget">
            <div id="sketchpad_viewer"></div>
          </div>
        </div>

        <script type="text/javascript">
          $(document).ready(function() {
            var strokes = [];

            var sketchpad_editor = Raphael.sketchpad("sketchpad_editor", {
              width: 260,
              height: 260,
              editing: true,  // true is default
              strokes: strokes
            });
            sketchpad_editor.change(function() {
              $("#input1").val(sketchpad_editor.json());
            });

            var sketchpad_viewer = Raphael.sketchpad("sketchpad_viewer", {
              width: 260,
              height: 260,
              editing: false
            });

            $("#update_sketchpad_viewer").click(function() {
              sketchpad_viewer.json($('#input1').val());
            });
          });
        </script>


        <div class="form=group">
            {{Form::label('job_type', 'Job Type:')}}
            </br>
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
</br>
                @if(count($bool_types) > 0)
                    @foreach($bool_types as $bool_id => $bool_name)
                        {{Form::radio($job_option_id, $bool_id, ['class' => 'form-control'])}} {{$bool_name}}
                    @endforeach
                @else
                    <h1>No Types Listed!</h1>
                @endif
                </br>
            @endforeach
            </div>
        @endif
        </br>

        @if (count($users) > 0)
        <div class="form=group">
            {{Form::label('job_created_by', 'Job Created by:')}}
                @if(count($users) > 0)
                {{ Form::select('job_created_by', $users, $current_user, ['class' => 'form-control m-bot15']) }}
                @else
                    <h1>No Users Listed!</h1>
                @endif
            </div>
            </br>
        @endif



        {{Form::submit('Submit', ['class=btn btn-primary'])}}
        {!! Form::close() !!}
        <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
        <script>
            CKEDITOR.replace( 'article-ckeditor' );
        </script>
@endsection
