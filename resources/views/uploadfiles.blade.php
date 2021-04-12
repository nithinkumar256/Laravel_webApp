@extends('layouts.app')
@extends('layouts.navbar') 
@include('flash')
 @section('content')
    <div class="container">
    <div class="card">
            <div class="card-body">
                
                <form action="/home/upload" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="title">Document name</label>
                        <p>Upload documents in pdf format only</p>
                        <input type="text"  name="title" value=""class="form-control">
                    </div>
                    <div class="form-group">
                    <label for="image">File Input</label> 
                    <input type="file" name="file" id="file">
                    </div>                  
                    <div class="form-group">
                        <button class="btn btn-success" type="submit">Upload</button>
                    </div>
                    @csrf
                </form>
            </div>
            
        </div>
</div>
    </div>
    
    @endsection