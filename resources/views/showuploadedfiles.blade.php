@extends('layouts.navbar')
@extends('layouts.app')
@section('content')
    <div class="container">
    <script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    </script>
    <style>
    .btn {
  background-color: DodgerBlue;
  border: none;
  color: white;
  padding: 12px 30px;
  cursor: pointer;
  font-size: 10px;
}

/* Darker background on mouse-over */
.btn:hover {
  background-color: RoyalBlue;
}
    </style>
    <div class="card">
            <div class="card-body">
            <table class="table" is-narrow>
                    <thead>
                    <tr>
                    <th>Document</th>
                    <th>Download</th>
                    <th>Delete</th>
                    <th></th>
                    </tr>
                    </thead>
                    
                    <tbody>
                    @foreach($getdocuments as $document)
                    <tr>
                    <th>{{$document->title}}</th>
                  
                    <th>
                    <form class="form" action="/downloadfile" method ="POST" role="form">
                    <div class="form-group">
                      <input type="hidden" class="form-control" value={{$document->attachment}} name="file">
                    </div>
                    <div class="form-group">
                      <input type="hidden" class="form-control" value={{$document->title}} name="title">
                    </div>
                    <div class="form-group">
                    <button class="btn"><i class="fa fa-download"></i> Download</button>
                    </div>

                  @csrf
                    </form>
                    </th>
                    <th>
                    <form class="form" action="/deletefile" method ="POST" role="form">
                    <div class="form-group">
                      <input type="hidden" class="form-control" value={{$document->attachment}} name="file">
                    </div>
                    
                    <div class="form-group">
                    <button class="btn"><i class="fa fa-download"></i> Delete</button>
                    </div>

                    @csrf
                    </form>
                    </th>
                    
                              
                    </tr>
                    @endforeach
                    </tbody>
                    </table>
                
            </div>
            
        </div>
</div>
    </div>
    
    @endsection

  