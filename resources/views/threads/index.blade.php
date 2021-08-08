@extends('layouts.app')

@section('content')
    <div class="container">
        @foreach ($threads as $thread)
        <div class="card mb-3">
            <div class="card-body">
              <h5 class="card-title">
                  <a href="{{$thread->path()}}">{{$thread->title}}</a>
                  {{-- <a href="/threads/{{$thread->category->slug}}/{{$thread->id}}">{{$thread->title}}</a> --}}
              </h5>
              <p class="card-text">{{$thread->body}}</p>
              <a href="{{$thread->path()}}" class="btn btn-primary">Read Thread</a>
            </div>
          </div>
        @endforeach
    </div>
@endsection