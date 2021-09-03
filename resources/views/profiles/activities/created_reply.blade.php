<x-activity>
    <x-slot name="heading">
        {{$profileUser->name}} reply to 
            <a href="{{$record->subject->thread->path()}}">
                {{$record->subject->thread->title}}
            </a>
    </x-slot>
    {{$record->subject->body}}

</x-activity>
