@extends('layouts.app')

@section('content')
    <div class="container">
        <form method="POST" action="{{route('threads.store')}}">
            @csrf
            <div class="form-group">
                <input type="text" class="form-control" id="title" name="title" placeholder="Title">
            </div>
            <div class="form-group">
                <textarea class="form-control" id="body" name="body" rows="3" placeholder="Add content"></textarea>
              </div>
            <button type="submit" class="btn btn-primary">Publish</button>
          </form>
    </div>
@endsection