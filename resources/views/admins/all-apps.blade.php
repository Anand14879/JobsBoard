@extends('layouts.admin')
@section('content')

<div class="row">
    <div class="col">
      <div class="card">
        <div class="card-body">
           @include('partial.status_msg')
          <h5 class="card-title mb-4 d-inline">Job Applications</h5>

          <table class="table">
            <thead>
              <tr>
                <th scope="col">user_id</th>
                <th scope="col">cv</th>
                <th scope="col">job_id</th>
                <th scope="col">job_title</th>
                <th scope="col">company</th>
                <th scope="col">delete</th>
              </tr>
            </thead>
            <tbody>

                @foreach ($apps->sort() as $app )
                <tr> 
                    <th scope="row">{{ $app->user->name}}</th>
                    <td><a class="btn btn-success" href="{{ asset('assets/cvs/'.$app->cv.'') }}">CV</a></td>
                    <td><a class="btn btn-success" href="{{ route('single.job', $app->job_id) }}">{{ $app->job->job_title }}</a></td>
                    <td>{{$app->job_title}}</td>
                     <td>{{ $app->company }}</td>  
                     <td><a href="{{ route('delete.apps',$app->id) }}" class="btn btn-danger  text-center ">delete</a></td>
                  </tr>
                @endforeach
              
            </tbody>
          </table> 
        </div>
      </div>
    </div>
  </div>

@endsection