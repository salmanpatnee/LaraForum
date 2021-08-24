@extends('layouts.app')

@section('content')
<div class="container">
    <div class="jumbotron">
      <h1>{{$profileUser->name}} since {{$profileUser->created_at->diffForHumans()}}</h1>
    </div>

    @forelse ($activities as $date => $activity)
      <h3>{{$date}}</h3>
      <hr>
      @foreach ($activity as $record)
        @include("profiles.activities.{$record->type}")     
      @endforeach
     
    @empty
      <p class="text-center">There were no threads.</p>
    @endforelse

  

  </div>
@endsection