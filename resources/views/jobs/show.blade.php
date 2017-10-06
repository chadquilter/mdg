@extends('layouts.app')

@section('content')
    <div>
    <a href="/jobs" class="btn btn-default">Go Back</a>
    @if($job)
        <h1>{{$job->job_title}}</h1>
        <div>
            <p>
                {!!$job->job_summary!!}
            </p>
            </br>&nbsp
            <p>
                {{$job->job_notes}}
            </p>
            </br>
            <p>
                {{$job->job_status}}
            </p>
            <hr>
            <small>Job Created: {{$job->created_at}} By: {{$job->user->name}}</small>
            <hr>
            <a href="/jobs/{{$job->job_id}}/edit" class="btn btn-default">Edit</a>
            {!!Form::open(['action' => ['JobsController@destroy', $job->job_id], 'method' => 'POST', 'class' => 'pull-right'])!!}
                {{Form::hidden('_method', 'DELETE')}}
                {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
            {!!Form::close()!!}
            </br>
        </div>
    @else
        <div class="alert alert-danger">
            <strong>The Job id used was not found!</strong>
            Please go back to the jobs listing.
        </div>
    @endif
    </br>
    </div>
@endsection
