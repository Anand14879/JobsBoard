@extends('layouts.app')

@section('content')

<section class="section-hero overlay inner-page bg-image" style="background-image: url('{{ asset('assets/images/hero_1.jpg') }}'); " id="home-section">
    <div class="container">
      <div class="row">
        <div class="col-md-7">
          <h1 class="text-white font-weight-bold">Update Details</h1>
          <div class="custom-breadcrumbs">
            <a href="#">Home</a> <span class="mx-2 slash">/</span>
            <a href="#">Job</a> <span class="mx-2 slash">/</span>
            <span class="text-white"><strong>Update Details</strong></span>
          </div>
        </div>
      </div>
    </div>
  </section>

  <div class="container">
    @include('partial.status_msg')
  </div>

  <section class="site-section">
    <div class="container">

      <div class="row align-items-center mb-5">
        <div class="col-lg-8 mb-4 mb-lg-0">
          <div class="d-flex align-items-center">
            <div>
              <h2>Update Details</h2>
            </div>
          </div>
        </div>
       
      </div>
      <div class="row mb-5">
        <div class="col-lg-12">
          <form class="p-4 p-md-5 border rounded" action="{{ route('update.details') }}" method="post">
          @csrf
            <!--job details-->
          
            <div class="form-group">
              <label for="job-title">Name</label>
              <input type="text" value="{{ $userDetails->name }}" name="name" class="form-control" id="job-title" placeholder="{{ $userDetails->name }}">
              @if($errors->has('name'))
              <p class="alert alert-success">{{ $errors->first('name') }}</p>
              @endif
            
            </div>
            

            <div class="form-group">
                <label for="job-title">Job Title</label>
                <input type="text" value="{{ $userDetails->job_title }}" name="job_title" class="form-control" id="job-title" placeholder="{{ $userDetails->job_title }}">
                @if($errors->has('job_title'))
              <p class="alert alert-success">{{ $errors->first('job_title') }}</p>
              @endif
              </div>
              


            <div class="row form-group">
                <div class="col-md-12">
                  <label class="text-black" for="">Bio</label> 
                  <textarea name="bio"  id="" cols="30" rows="7" class="form-control" placeholder="Write Your bio.">{{ $userDetails->bio }}</textarea>
                  @if($errors->has('bio'))
                  <p class="alert alert-success">{{ $errors->first('bio') }}</p>
                  @endif
                </div>
              </div>

              <div class="form-group">
                <label for="job-title">Facebook</label>
                <input type="text" value="{{ $userDetails->facebook }}" name="facebook" class="form-control" id="job-title" placeholder="facebook">
                @if($errors->has('facebook'))
                <p class="alert alert-success">{{ $errors->first('facebook') }}</p>
                @endif
              
              </div>

             

              <div class="form-group">
                <label for="job-title">Twiiter</label>
                <input type="text" value="{{ $userDetails->twitter }}" name="twitter" class="form-control" id="job-title" placeholder="twitter">
                @if($errors->has('twitter'))
                <p class="alert alert-success">{{ $errors->first('twitter') }}</p>
                @endif
              
              </div>
            
              <div class="form-group">
                <label for="job-title">LinkedIn</label>
                <input type="text" value="{{ $userDetails->linkedin }}" name="linkedin" class="form-control" id="job-title" placeholder="linkedin">
                @if($errors->has('linkedin'))
                <p class="alert alert-success">{{ $errors->first('linkedin') }}</p>
                @endif
              </div>
              
              <div class="col-lg-4 ml-auto">
                <div class="row">  
                  <div class="col-6">
                    <input type="submit" name="submit" class="btn btn-block btn-primary btn-md" style="margin-left: 200px;" value="Update Job">
                  </div>
                </div>
            </div>


          </form>
        </div>

       
      </div>
     
    </div>
  </section>

  @endsection
