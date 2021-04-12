@extends('layouts.app')
@extends('layouts.navbar')
@section('content')
<div class="container">

<h3>Subject : {{$stuff->subject}}</h1>
<h3>Topic   : {{$stuff->topic}}</h3>
<h2>{!! $stuff->notes !!}</h2>

</div>




@endsection