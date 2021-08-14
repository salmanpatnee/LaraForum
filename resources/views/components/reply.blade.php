<div class="row">
    <div class="col-sm-12">
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