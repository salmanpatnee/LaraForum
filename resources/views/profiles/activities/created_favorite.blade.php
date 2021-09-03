<x-activity>
    <x-slot name="heading">
        <a href="{{$record->subject->favorited->path()}}">
            {{$profileUser->name}} favorite a reply    
               
        </a>
    </x-slot>
    {{$record->subject->favorited->body}}

</x-activity>
