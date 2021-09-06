<reply :attributes="{{$reply}}" inline-template>
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
                    <div v-if="editing">
                        <div class="form-group">
                            <textarea class="form-control" v-model="body"></textarea>
                        </div>
                        <div class="d-flex">
                            <button class="btn btn-primary btn-sm mr-2" @click="update">Update</button>
                            <button class="btn btn-link btn-sm" @click="editing = false">Cancle</button>
                        </div>
                    </div>
                    <div v-else>
                        <p class="card-text" v-text="body"></p>
                    </div>
                    
                </div>
                @can('delete', $reply)
                    <div class="card-footer text-muted d-flex">
                        <button class="btn btn-primary btn-sm mr-2" @click="editing = true">Edit</button>
                        <form method="POST" action="{{ route('replies.destroy', $reply) }}">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </div>    
                @endcan
                
            </div>
        </div>
    </div>
</reply>
