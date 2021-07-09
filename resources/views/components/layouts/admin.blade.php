@props(['title' => null])

<x-layouts.base :title="$title" {{ $attributes }}>

    <x-partials.navbar>

        <x-partials.navbar.link href="{{ route('admin.dashboard') }}">
            {{__('Dashboard')}}
        </x-partials.navbar.link>

    </x-partials.navbar>

    <div class="container mt-3">

        <h1>{{ $title }}</h1>

        {{ $slot }}
    </div>
</x-layouts.base>
