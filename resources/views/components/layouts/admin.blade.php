@props(['title' => null])

<x-layouts.base :title="$title" {{ $attributes }}>

    <x-partials.navbar>

        <x-partials.navbar.link href="{{ url('/') }}">
            {{__('Admin panel')}}
        </x-partials.navbar.link>

    </x-partials.navbar>

    <div class="container mt-3">
        {{ $slot }}
    </div>
</x-layouts.base>
