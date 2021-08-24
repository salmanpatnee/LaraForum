<div class="card mb-3">
    <div class="card-body">
        <div class="d-flex justify-content-between">
        <h5 class="card-title">
            {{$profileUser->name}} reply to a 
            <a href="{{$record->subject->thread->path()}}">
                {{$record->subject->thread->title}}
            </a>
        </h5>
        <span>
           
        </span>
        </div>
        
        <p class="card-text">{{$record->subject->body}}</p>
      
    </div>
</div>