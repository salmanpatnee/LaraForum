@extends('layouts.app')

@section('content')
    <div class="container">
        @foreach ($threads as $thread)
        <div class="card mb-3">
            <div class="card-body">
              <h5 class="card-title">
                  <a href="{{route('threads.show', $thread)}}">{{$thread->title}}</a>
              </h5>
              <p class="card-text">{{$thread->body}}</p>
              <a href="{{route('threads.show', $thread)}}" class="btn btn-primary">Read Thread</a>
            </div>
          </div>
        @endforeach
    </div>
@endsection