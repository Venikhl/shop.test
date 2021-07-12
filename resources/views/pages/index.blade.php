<x-layouts.app title="Главная">

    @foreach(App\Models\Product::all() as $product)
        <div class="card card-body my-3">
            {{ $product->name }}
        </div>
    @endforeach

</x-layouts.app>
