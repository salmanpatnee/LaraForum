@extends('layouts.app')

@section('content')
    <thread-view :initial-replies-count="{{$thread->replies_count}}" inline-template>
        <div class="container">
            <div class="row">
                <div class="col-sm-8">

                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <h5 class="card-title">
                                    <a href="{{route('profile', $thread->owner->name)}}">
                                        {{$thread->owner->name}}
                                    </a> posted:
                                    {{$thread->title}}
                                </h5>
                                @can('update', $thread)
                                    <form action="{{route('threads.destroy', $thread->id)}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn-danger btn btn-sm">Delete</button>
                                    </form>
                                @endcan
                            
                            </div>
                            <p class="card-text">{{$thread->body}}</p>
                        </div>
                    </div>

                    <replies @removed="repliesCount--" @added="repliesCount++"></replies>

                </div>
                <div class="col-md-4">
                    <div class="card mb-3">
                        <div class="card-body">
                            <p>
                            This thread was published on {{$thread->created_at->diffForHumans()}} by 
                            <a href="{{route('profile', $thread->owner->name)}}">{{$thread->owner->name}}</a> and currently has <span v-text="repliesCount"></span> {{Str::plural('comment', $thread->replies_count)}}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            
            
            
            
        
        </div>
    </thread-view>
@endsection