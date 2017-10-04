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


        <div id="editor"></div>

<form action="save.php" method="post">
  <input type="hidden" name="data" />
  <input type="submit" value="Save" />
</form>

<script type="text/javascript">
  var sketchpad = Raphael.sketchpad("editor", {
    width: 400,
    height: 400,
    editing: true
  });

  // When the sketchpad changes, update the input field.
  sketchpad.change(function() {
    $("#data").val(sketchpad.json());
  });
</script>

<div id="viewer"></div>

<script type="text/javascript">
  var strokes = [{
    type:"path",
    path:[["M",10,10],["L",390,390]],
    fill:"none", "stroke":"#000000",
    stroke-opacity:1,
    stroke-width:5,
    stroke-linecap:"round",
    stroke-linejoin:"round"
  }];
  var sketchpad = Raphael.sketchpad("viewer", {
    width: 400,
    height: 400,
    strokes: strokes,
    editing: false
  });
</script>

<div id="editor" class="widget" style="height:260px;"></div>
<input type="hidden" id="data2" name="data2" />

<div class="clear widget_actions span-2">
  <div class="_title">Color</div>
  <div id="editor_black" class="selected">Black</div>
  <div id="editor_red">Red</div>
</div>
<div class="widget_actions span-2">
  <div class="_title">Width</div>
  <div id="editor_thin" class="selected">Thin</div>
  <div id="editor_thick">Thick</div>
</div>
<div class="widget_actions span-2">
  <div class="_title">Opacity</div>
  <div id="editor_solid" class="selected">Solid</div>
  <div id="editor_fuzzy">Fuzzy</div>
</div>
<div class="widget_actions span-2 last">
  <div id="editor_undo" class="disabled">Undo</div>
  <div id="editor_redo" class="disabled">Redo</div>
  <div id="editor_clear" class="disabled">Clear</div>
</div>
<div class="clear"></div>
<div class="widget_actions span-4">
  <div id="editor_draw_erase">Draw</div>
</div>
<div class="widget_actions span-4 last">
  <div id="editor_animate">Animate!</div>
</div>

<script type="text/javascript">
  $(document).ready(function() {
    var sketchpad = Raphael.sketchpad("editor", {
      height: 260,
      width: 260,
      editing: true // true is default
    });

    // When the sketchpad changes, update the input field.
    sketchpad.change(function() {
      $("#data2").val(sketchpad.json());
    });

    sketchpad.strokes([{
      "type":"path",
      "path":[["M",10,10],["L",90,90]],
      "fill":"none",
      "stroke":"#000000",
      "stroke-opacity":1,
      "stroke-width":5,
      "stroke-linecap":"round",
      "stroke-linejoin":"round"
    }]);

    function enable(element, enable) {
      if (enable) {
        $(element).removeClass("disabled");
      } else {
        $(element).addClass("disabled");
      }
    };

    function select(element1, element2) {
      $(element1).addClass("selected");
      $(element2).removeClass("selected");
    }

    $("#editor_undo").click(function() {
      sketchpad.undo();
    });
    $("#editor_redo").click(function() {
      sketchpad.redo();
    });
    $("#editor_clear").click(function() {
      sketchpad.clear();
    });
    $("#editor_animate").click(function() {
      sketchpad.animate();
    });

    $("#editor_thin").click(function() {
      select("#editor_thin", "#editor_thick");
      sketchpad.pen().width(5);
    });
    $("#editor_thick").click(function() {
      select("#editor_thick", "#editor_thin");
      sketchpad.pen().width(15);
    });
    $("#editor_solid").click(function() {
      select("#editor_solid", "#editor_fuzzy");
      sketchpad.pen().opacity(1);
    });
    $("#editor_fuzzy").click(function() {
      select("#editor_fuzzy", "#editor_solid");
      sketchpad.pen().opacity(0.3);
    });
    $("#editor_black").click(function() {
      select("#editor_black", "#editor_red");
      sketchpad.pen().color("#000");
    });
    $("#editor_red").click(function() {
      select("#editor_red", "#editor_black");
      sketchpad.pen().color("#f00");
    });
    $("#editor_draw_erase").toggle(function() {
      $(this).text("Erase");
      sketchpad.editing("erase");
    }, function() {
      $(this).text("Draw");
      sketchpad.editing(true);
    });

    function update_actions() {
      enable("#editor_undo", sketchpad.undoable());
      enable("#editor_redo", sketchpad.redoable());
      enable("#editor_clear", sketchpad.strokes().length > 0);
    }

    sketchpad.change(update_actions);

    update_actions();
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
