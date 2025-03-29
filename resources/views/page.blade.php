<x-app-layout>
    <h1>{{ $page->title }}</h1>

    <x-markdown>
        {!!  $page->content !!}
    </x-markdown>
</x-app-layout>
