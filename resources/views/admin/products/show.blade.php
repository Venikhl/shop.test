<x-layouts.admin :title="$product->name">

    <x-slot name="toolbar">
        <form action="{{ route('admin.products.destroy', $product) }}" method="post">
            @csrf @method('delete')

            <div class="btn-group">
                <a class="btn btn-warning" href="{{ route('admin.products.edit', $product) }}">
                    {{__('Edit')}}
                </a>

                <button class="btn btn-danger">
                    {{__('Delete')}}
                </button>
            </div>

        </form>
    </x-slot>


    @if($product->category)
        <div class="card my-3">
            <div class="card-header">
                {{ __('Category') }}
            </div>
            <div class="card-body">
                {{ $product->category->name ?? __('Without category') }}
            </div>
        </div>
    @endif

    @if($description = trim($product->description))
        <div class="card my-3">
            <div class="card-header">
                {{ __('Description') }}
            </div>
            <div class="card-body">
                {{ $product->description }}
            </div>
        </div>
    @endif
</x-layouts.admin>
