@extends('layouts.app')
@extends('layouts.navbar') 

 @section('content')
    <div class="container">
        <form class="form" action="/addnotes" method ="POST" role="form" autocomplete="off">
            <div class="form-group">
                <label for="inputPasswordOld">Topic</label>
                <input type="text" class="form-control" name="topic">
              
            </div>
            <div class="form-group">
                <label for="inputPasswordOld">Subject</label>
                <input type="text" class="form-control" name="subject">
                
            </div>
            <div class="form-group">
                <textarea class="form-control" id="summary-ckeditor" name="notes"></textarea>
            </div>
            
            <div class="form-group">
                <button type="submit" class="btn btn-success btn-lg float-right">Save</button>
            </div>

             @csrf 
        </form>
    <script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
    <script>
    CKEDITOR.replace( 'summary-ckeditor',{
        filebrowserUploadUrl:  "{{route('ckeditor.upload', ['_token' => csrf_token() ])}}",
        filebrowserUploadMethod: 'form'
    });
    </script>
</div>
 @endsection