<x-app-layout>

    <div class="grid lg:grid-cols-2 gap-4">
        <div>
            <h1>Create new section</h1>
            <form action="{{ route('sections.store') }}" method="POST" class="border border-gray-200 p-4 rounded-lg">
                @csrf
                <x-bladewind::input name="title" label="Section name" show_error_inline="true" />
                <x-bladewind::button type="primary" can_submit="true">Save</x-bladewind::button>
            </form>
        </div>
        <div>
            <h1>Create new page</h1>
            <form action="{{ route('pages.store') }}" method="POST"  class="border border-gray-200 p-4 rounded-lg">
                @csrf
                <x-bladewind::dropdown name="section_id" label="Section" :data="$sections" show_error_inline="true" />
                <x-bladewind::input name="title" label="Page name" show_error_inline="true" />
                <x-bladewind::button type="primary" can_submit="true">Save</x-bladewind::button>
            </form>
        </div>
    </div>

</x-app-layout>
