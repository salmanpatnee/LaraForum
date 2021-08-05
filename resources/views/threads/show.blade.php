@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title">
                        {{$thread->title}}
                    </h5>
                <p class="card-text">{{$thread->body}}</p>
                </div>
            </div>
        </div>
        </div>
        
            @foreach ($thread->replies as $reply)
                <div class="row">
                    <div class="col-sm-8">
                        <div class="card mb-4">
                            <div class="card-header">
                                <a href="#">{{$reply->owner->name}}</a> said {{$reply->created_at->diffForHumans()}}
                            </div>
                            <div class="card-body">
                                <p class="card-text">{{$reply->body}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        
       
    </div>
@endsection