@extends('layouts.app')


@section('content')
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

        <div id="canvasDiv">test</div>

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
        <script type="text/javascript">
          var canvasDiv = document.getElementById('canvasDiv');
          canvas = document.createElement('canvas');
          canvas.setAttribute('width', canvasWidth);
          canvas.setAttribute('height', canvasHeight);
          canvas.setAttribute('id', 'canvas');
          canvasDiv.appendChild(canvas);
          if(typeof G_vmlCanvasManager != 'undefined') {
            canvas = G_vmlCanvasManager.initElement(canvas);
          }
          context = canvas.getContext("2d");

          $('#canvas').mousedown(function(e){
            var mouseX = e.pageX - this.offsetLeft;
            var mouseY = e.pageY - this.offsetTop;

            paint = true;
            addClick(e.pageX - this.offsetLeft, e.pageY - this.offsetTop);
            redraw();
          });

          $('#canvas').mousemove(function(e){
            if(paint){
              addClick(e.pageX - this.offsetLeft, e.pageY - this.offsetTop, true);
              redraw();
            }
          });

          $('#canvas').mouseup(function(e){
            paint = false;
          });

          $('#canvas').mouseleave(function(e){
            paint = false;
          });

          var clickX = new Array();
          var clickY = new Array();
          var clickDrag = new Array();
          var paint;

          function addClick(x, y, dragging)
          {
            clickX.push(x);
            clickY.push(y);
            clickDrag.push(dragging);
          }

          function redraw(){
  context.clearRect(0, 0, context.canvas.width, context.canvas.height); // Clears the canvas

  context.strokeStyle = "#df4b26";
  context.lineJoin = "round";
  context.lineWidth = 5;

  for(var i=0; i < clickX.length; i++) {
    context.beginPath();
    if(clickDrag[i] && i){
      context.moveTo(clickX[i-1], clickY[i-1]);
     }else{
       context.moveTo(clickX[i]-1, clickY[i]);
     }
     context.lineTo(clickX[i], clickY[i]);
     context.closePath();
     context.stroke();
  }
}


        </script>

        {{Form::submit('Submit', ['class=btn btn-primary'])}}
        {!! Form::close() !!}
        <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
        <script>
            CKEDITOR.replace( 'article-ckeditor' );
        </script>
@endsection
