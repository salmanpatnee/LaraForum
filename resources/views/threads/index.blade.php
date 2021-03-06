@extends('layouts.app')

@section('content')
    <div class="container">
        @forelse ($threads as $thread)
        <div class="card mb-3">
            <div class="card-body">
              <div class="d-flex justify-content-between">
                <h5 class="card-title">
                  <a href="{{$thread->path()}}">
                    @if (auth()->check() && $thread->hasUpdatesFor(auth()->user()))
                        <strong>{{$thread->title}}</strong>
                    @else
                      {{$thread->title}}
                    @endif
                  </a>
                </h5>
                <span>
                  <a href="{{$thread->path()}}">
                    {{$thread->replies_count}} {{Str::plural('reply', $thread->replies_count)}}
                  </a> 
                </span>
              </div>
              
              <p class="card-text">{{$thread->body}}</p>
              <a href="{{$thread->path()}}" class="btn btn-primary">Read Thread</a>
            </div>
          </div>
        @empty
          <p>No threads were found.</p>
        @endforelse
    </div>
@endsection