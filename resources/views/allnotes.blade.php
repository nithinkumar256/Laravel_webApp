@extends('layouts.app')
@extends('layouts.navbar') 
@section('content')
<div class="container">
    <table class="table" is-narrow>
        <thead>
        <tr>
        
        <th>Subject</th>
        <th>Notes</th>
        </tr>
        </thead>
        
        <tbody>
        @foreach($allsubjects as $subject)
        
        <tr>
           
        <th>{{$subject->subject}}</th>
        <th><a class="button is-outlined" href="/viewnotes/topic/{{$subject->subject}}"><button type="button" class="btn btn-dark">View Notes</button</a></th>                    
        </tr>
        @endforeach
      
        </tbody>
        </table>

</div>
@endsection