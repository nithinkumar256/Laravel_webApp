@extends('layouts.navbar')
@extends('layouts.app')

@extends('flash')
@section('content')

 
{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div> --}}
<div class="container">    
    
    <div class="row">
        <div class="col-md-3 col-sm-6">
          <div class="card">
          <img class="card-img-top" style="max-height: 170px" src="{{URL::asset('imgs/takenotes.png')}}" alt="Card image cap">
            <div class="card-body">
              <h5 class="card-title">Take Notes</h5>
              <p class="card-text">Take notes using a rich text editor</p>
              <a href="/addnotes" class="btn btn-primary">Take Notes</a>
            </div>
          </div>
        </div>
        <div class="col-md-3 col-sm-6">
          <div class="card" >
            <img class="card-img-top" style="max-height: 170px" src="{{URL::asset('imgs/viewnotes.png')}}" alt="Card image cap">
            <div class="card-body">
              <h5 class="card-title">View all the notes taken topic wise</h5>
              <p class="card-text">View All The Notes</p>
              <a href="/viewnotes" class="btn btn-primary">View all notes</a>
            </div>
          </div>
        </div>
        <div class="col-md-3 col-sm-6">
            <div class="card" >
              <img class="card-img-top"   style="max-height: 170px"  src="{{URL::asset('imgs/upload.jpg')}}" alt="Card image cap">
              <div class="card-body">
                <h5 class="card-title">Upload files for ease of access</h5>
                <p class="card-text">Upload Files</p>
                <a href="/home/uploadfiles" class="btn btn-primary">Upload Files</a>
              </div>
            </div>
          </div>
          <div class="col-md-3 col-sm-6">
            <div class="card" >
              <img class="card-img-top"   style="max-height: 170px"  src="{{URL::asset('imgs/downloadfiles.png')}}" alt="Card image cap">
              <div class="card-body">
                <h5 class="card-title">Download your uploaded files </h5>
                <p class="card-text">Download Files</p>
                <a href="/home/uploadednotes" class="btn btn-primary">Download Files</a>
              </div>
            </div>
          </div>
      </div>
      
</div>
@endsection 
