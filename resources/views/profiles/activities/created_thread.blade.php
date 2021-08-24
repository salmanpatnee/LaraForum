<x-activity>
    <x-slot name="heading">
        {{$profileUser->name}} publish  a thread: <a href="{{$record->subject->path()}}">
            {{$record->subject->title}}
        </a>
    </x-slot>
    {{$record->subject->body}}

</x-activity>
