@extends('layouts.app')

@section('content')
    <div class="container">

    <div class="card mb-3">
        <div class="card-body">
            <h5 class="card-title">
                {{$thread->title}}
            </h5>
        <p class="card-text">{{$thread->body}}</p>
        </div>
    </div>
       
    </div>
@endsection