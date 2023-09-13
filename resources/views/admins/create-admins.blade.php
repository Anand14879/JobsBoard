@extends('layouts.admin')
@section('content')

<div class="row">
    <div class="col">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title mb-5 d-inline">Create Admins</h5>
      <form method="POST" action="{{ route('store.admins') }}" enctype="multipart/form-data">
            <!-- Email input -->
            @csrf
            <div class="form-outline mb-4 mt-4">
              <input type="email" name="email" id="form2Example1" class="form-control" placeholder="email" />
             
            </div>
            @if($errors->has('email'))
            <p class="alert alert-success">{{ $errors->first('email') }}</p>
            @endif
            <div class="form-outline mb-4">
              <input type="text" name="username" id="form2Example1" class="form-control" placeholder="username" />
            </div>
            @if($errors->has('username'))
            <p class="alert alert-success">{{ $errors->first('username') }}</p>
            @endif
            <div class="form-outline mb-4">
              <input type="password" name="password" id="form2Example1" class="form-control" placeholder="password" />
            </div>
            @if($errors->has('password'))
            <p class="alert alert-success">{{ $errors->first('password') }}</p>
            @endif

           
        
            
          


            <!-- Submit button -->
            <button type="submit" name="submit" class="btn btn-primary  mb-4 text-center">create</button>

      
          </form>

        </div>
      </div>
    </div>
  </div>



@endsection