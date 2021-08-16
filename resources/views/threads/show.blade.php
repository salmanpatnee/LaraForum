@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-8">

                <div class="card mb-3">
                    <div class="card-body">
                        <h3 class="card-title">
                            <a href="{{route('profile', $thread->owner->name)}}">
                                {{$thread->owner->name}}
                            </a> posted:
                            {{$thread->title}}
                        </h3>
                        <p class="card-text">{{$thread->body}}</p>
                    </div>
                </div>

                {{-- Replies --}}
                @foreach ($replies as $reply)
                    <x-reply :reply="$reply"/>
                @endforeach

                {{$replies->links()}}

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
             <div class="col-md-4">
                <div class="card mb-3">
                    <div class="card-body">
                        <p>
                           This thread was published on {{$thread->created_at->diffForHumans()}} by 
                           <a href="{{route('profile', $thread->owner->name)}}">{{$thread->owner->name}}</a> and currently has {{$thread->replies_count}} {{Str::plural('comment', $thread->replies_count)}}
                        </p>
                    </div>
                </div>
             </div>
        </div>
        
        
        
        
       
    </div>
@endsection