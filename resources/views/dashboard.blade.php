@extends('layouts.app')

@section('content')
<br>
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
                    <a href="/quotes" class="btn btn-success">Create Quote</a>
                    <a href="/address/create" class="btn btn-warning">Add Address</a>
                    <a href="/media/create" class="btn btn-danger">Add Media</a>

                    @if(count($jobs) > 0)
                    <table class="table table-striped table-hover table-sm table-responsive">
                      <thead class="thead-inverse">
                        <tr>
                            <th nowrap><h3><span class="badge">{{ $jobs->total() }}</span> Job Entries:</h3></th>
                            <th></th>
                            <th></th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($jobs as $job)
                        <tr>
                            <td width=80%><strong>Job: </strong>{{$job->job_title}}</td>
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
                          <td></td>
                          <td></td>
                        </tr>
                      </tfoot>
                    </table>
                    @endif

                    @if(count($quotes) > 0)
                    <table class="table table-striped table-hover table-sm table-responsive">
                        <thead class="thead-inverse">
                        <tr>
                            <th nowrap><h3><span class="badge">{{ $quotes->total() }}</span> Quote Entries:</h3></th>
                            <th></th>
                            <th></th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($quotes as $quote)
                        <tr>
                            <td width=80%><strong>Quote: </strong> {{$quote->title}}</td>
                            <td><a href="/quotes/{{$quote->id}}/edit" class="btn btn-default">Edit</a></td>
                            <td>
                              {!!Form::open(['action' => ['QuotesController@destroy', $quote->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
                                  {{Form::hidden('_method', 'DELETE')}}
                                  {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                              {!!Form::close()!!}
                            </td>
                        </tr>
                        @endforeach
                      </tbody>
                      <tfoot>
                        <tr>
                          <td>{{$quotes->links()}}</td>
                          <td></td>
                          <td></td>
                        </tr>
                      </tfoot>
                    </table>
                    @endif

                    @if(count($addresses) > 0)
                    <table class="table table-striped table-hover table-sm table-responsive">
                        <thead class="thead-inverse">
                        <tr>
                            <th nowrap><h3><span class="badge">{{ $addresses->total() }}</span> Saved Addresses:</h3></th>
                            <th></th>
                            <th></th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($addresses as $address)
                        <tr>
                            <td width=80%><strong>Address: </strong>
                              <div class=row>
                                <div class="col-md-4">
                                  <br> {{$address->address1}}
                                  <br> {{$address->city}} , {{$address->state}}
                                  <br> {{$address->zipcode}}
                                </div>
                                <div class="col-md-8">
                                  <div class="mapouter">
                                    <div class="gmap_canvas">
                                      <iframe width="200" height="200" id="gmap_canvas" src="https://maps.google.com/maps?q={{$address->address1}},{{$address->city}},{{$address->state}},{{$address->zipcode}}=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
                                    </div>
                                    <style>.mapouter{overflow:hidden;height:200px;width:200px;}.gmap_canvas {background:none!important;height:200px;width:200px;}</style>
                                  </div>
                              </div>
                            </td>
                            <td><a href="/address/{{$address->id}}/edit" class="btn btn-default">Edit</a></td>
                            <td>
                              {!!Form::open(['action' => ['AddressController@destroy', $address->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
                                  {{Form::hidden('_method', 'DELETE')}}
                                  {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                              {!!Form::close()!!}
                            </td>
                        </tr>
                        @endforeach
                      </tbody>
                      <tfoot>
                        <tr>
                          <td>{{$addresses->links()}}</td>
                          <td></td>
                          <td></td>
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
