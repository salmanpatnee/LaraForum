<div class="row">
    <div class="col-sm-12">
        <div class="card mb-4">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <h5>
                        <a href="#">{{$reply->owner->name}}</a> said {{$reply->created_at->diffForHumans()}}
                    </h5>
                    <form method="POSt" action="{{route('favorites.store', $reply->id)}}">
                        @csrf
                        <button 
                            class="btn btn-primary" 
                            type="submit" 
                            {{$reply->isFavorited() ? 'disabled' : ''}}>
                            {{$reply->favorites()->count()}} 
                            {{Str::plural('Favorites', $reply->favorites()->count())}}
                        </button>
                    </form>
                </div>
                
            </div>
            <div class="card-body">
                <p class="card-text">{{$reply->body}}</p>
            </div>
        </div>
    </div>
</div>