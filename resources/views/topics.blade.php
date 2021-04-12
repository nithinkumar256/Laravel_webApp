@extends('layouts.app')
@extends('layouts.navbar')
@section('content')
<div class="container">
    <table class="table" is-narrow>
        <thead>
        <tr>
        
        <th>Topic</th>
        <th>Created At</th>
        <th>Notes</th>
        </tr>
        </thead>
        
        <tbody>
        @foreach($data as $topic)
        
        <tr>
           
        <th>{{$topic->topic}}</th>
        {{-- <th>{{\Carbon\Carbon::parse({{$topic->$created_at}})->diffForhumans()}}</th> --}}
        <th>{{$topic->created_at->format('m/d/Y')}}</th>
        <th><a class="button is-outlined" href="/viewnotes/topic/subject/{{Str::slug($topic->topic)}}"><button type="button" class="btn btn-dark">View Notes</button</a></th> 
            
        </tr>
        @endforeach
      
        </tbody>
        </table>

</div>




@endsection