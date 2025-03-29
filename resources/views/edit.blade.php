<x-app-layout>
    <div>
        <h2>{{ $section->title }}</h2>
    </div>

    <div>
        <form action="{{ route('store', ['page' => $page->id]) }}" method="POST">
            @csrf
            <div class="flex flex-col my-2">
                <label class="font-bold" for="title">Page title:</label>
                <input name="title" id="title" type="text" class="px-4 py-3 rounded-sm border border-gray-300 w-full my-2" value="{{ old('title') ?? $page->title }}" />
                <p class="font-bold">Page slug: <em class="font-normal italic">{{ $page->slug }}</em></p>
            </div>
            <div class="flex flex-col my-2">
                <label class="font-bold" for="content">Page content:</label>
                <textarea name="content" id="content" class="p-1 rounded-sm border border-gray-300 w-full my-2 min-h-80">{{ $page->content }}</textarea>
            </div>
            <div class="w-full my-4 flex justify-between">
                <input type="submit" value="Submit" class="border border-gray-300 px-3 py-2 rounded-sm" />
            </div>
        </form>
    </div>
</x-app-layout>
