@extends('layouts.app')

@section('content')
    <h1>Jobs</h1>
    @if(count($jobs) > 0)
        @foreach($jobs as $job)
            <div class="well">
                <h3><a href="/jobs/{{$job->job_id}}"> {{$job->job_title}} </a> </h3>
                <br>&nbsp
                <div id="web_space">
                    {!!$job->job_summary!!}
                    <center>
                        &nbsp</br>
                        <hr>
                        <small>Job Created: {{$job->created_at}} By: {{$job->name}} </small>
                    </center>
                </div>
            </div>
        @endforeach
        {{$jobs->links()}}
    @else
        <p>No jobs found</p>
    @endif
@endsection
