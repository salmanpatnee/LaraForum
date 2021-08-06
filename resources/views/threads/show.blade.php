@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="card mb-3">
                    <div class="card-body">
                        <h3 class="card-title">
                            <a href="#">
                                {{$thread->owner->name}}
                            </a> posted:
                            {{$thread->title}}
                        </h3>
                        <p class="card-text">{{$thread->body}}</p>
                    </div>
                </div>
             </div>
        </div>
        
        {{-- Replies --}}
        @foreach ($thread->replies as $reply)
            <x-reply :reply="$reply"/>
        @endforeach
        
        {{-- Reply Form --}}

        @if (auth()->check())
            <div class="row">
                <div class="col-sm-12">
                    <form method="POST" action="{{route('replies.store', $thread)}}">
                        @csrf
                        <div class="form-group">
                            <textarea class="form-control" id="body" name="body" rows="3" placeholder="Add comment"></textarea>
                          </div>
                        <button type="submit" class="btn btn-primary">Reply</button>
                      </form>
                </div>
            </div>
        @else
        <p class="text-cennter"><a href="{{route('login')}}">Sign in</a>  to participate into the discussion.</p>
        @endif
       
    </div>
@endsection