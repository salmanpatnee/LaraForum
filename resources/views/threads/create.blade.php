@extends('layouts.app')

@section('content')
    <div class="container">
        <form method="POST" action="{{route('threads.store')}}">
            @csrf
            <div class="form-group">
                <select name="category_id" id="category_id" class="form-control">
                    <option value="">Choose a category</option>
                    @foreach (App\Models\Category::all() as $category)
                        <option 
                        {{ old('category_id') == $category->id ? 'selected' : ''}}
                        value="{{$category->id}}">
                            {{$category->name}}
                        </option>
                    @endforeach
                </select>
            </div>
            
            <div class="form-group">
                <input type="text" class="form-control" id="title" name="title" placeholder="Title" value="{{old('title')}}">
            </div>
            <div class="form-group">
                <textarea class="form-control" id="body" name="body" rows="3" placeholder="Add content">{{old('body')}}</textarea>
              </div>
              <div class="form-group">
                <button type="submit" class="btn btn-primary">Publish</button>
              </div>
              
              @if (count($errors))
                  @foreach ($errors->all() as $error)
                    <div class="alert alert-danger" role="alert">
                        {{$error}}
                    </div>
                  @endforeach
              @endif
          </form>
    </div>
@endsection