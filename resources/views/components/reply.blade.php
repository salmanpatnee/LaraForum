<div id="reply-{{$reply->id}}" class="row">
    <div class="col-sm-12">
        <div class="card mb-4">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <h5>
                        <a href="{{route('profile', $reply->owner->name)}}">{{$reply->owner->name}}</a> said {{$reply->created_at->diffForHumans()}}
                    </h5>
                    <form method="POSt" action="{{route('favorites.store', $reply->id)}}">
                        @csrf
                        <button 
                            class="btn btn-primary" 
                            type="submit" 
                            {{$reply->isFavorited() ? 'disabled' : ''}}>
                            {{$reply->favorites_count}} 
                            {{Str::plural('Favorites', $reply->favorites_count)}}
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