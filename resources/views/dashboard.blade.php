@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <a href="/jobs/create" class="btn btn-primary">Create Job</a>
                    <a href="/quote/create" class="btn btn-success">Create Quote</a>
                    <a href="/address/create" class="btn btn-warning">Add Address</a>
                    <a href="/media/create" class="btn btn-danger">Add Media</a>
                    @if(count($jobs) > 0)
                    <h3>Your Job Entries:</h3>
                    <table class="table table-striped table-hover table-sm table-responsive">
                      <thead class="thead-inverse">
                        <tr>
                            <th>Sort</th>
                            <th></th>
                            <th></th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($jobs as $job)
                        <tr>
                            <td><strong>Job: </strong>{{$job->job_title}}</td>
                            <td><a href="/jobs/{{$job->job_id}}/edit" class="btn btn-default">Edit</a></td>
                            <td>
                              {!!Form::open(['action' => ['JobsController@destroy', $job->job_id], 'method' => 'POST', 'class' => 'pull-right'])!!}
                                  {{Form::hidden('_method', 'DELETE')}}
                                  {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                              {!!Form::close()!!}
                            </td>
                        </tr>
                        @endforeach
                      </tbody>
                      <tfoot>
                        <tr>
                          <td>
                            {{$jobs->links()}}
                          </td>
                          <td></td><td></td>
                        </tr>
                      </tfoot>
                    </table>
                    @endif

                    @if(count($jobs) > 0)
                    <h3>Your Quote Entries:</h3>
                    <table class="table table-striped table-hover table-sm table-responsive">
                        <thead class="thead-inverse">
                        <tr>
                            <th>Sort</th>
                            <th></th>
                            <th></th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($quotes as $quote)
                        <tr>
                            <td><strong>Quote: </strong> {{$quote->title}}</td>
                            <td><a href="/jobs/{{$quote->id}}/edit" class="btn btn-default">Edit</a></td>
                            <td>
                              {!!Form::open(['action' => ['JobsController@destroy', $quote->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
                                  {{Form::hidden('_method', 'DELETE')}}
                                  {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                              {!!Form::close()!!}
                            </td>
                        </tr>
                        @endforeach
                      </tbody>
                      <tfoot>
                        <tr>
                          <td>
                            {{$quotes->links()}}
                          </td>
                          <td></td><td></td>
                        </tr>
                      </tfoot>
                    </table>
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
