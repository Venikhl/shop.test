<x-layouts.admin :title="__('Orders')">

    @if($orders->isEmpty())
        <div class="alert alert-secondary">
            {{ __('There are no orders') }}
        </div>
    @else

        @foreach($orders as $order)

            <div class="card my-2">

                <div class="list-group list-group-lush">
                    <a href="{{ route('admin.orders.show', $order) }}" class="p-3 list-group-item list-group-item-action">

                        <div class="row">
                            <div class="col">
                                Name: {{$order->user->name}}
                            </div>
                            <div class="col">
                                Email: {{$order->user->email}}
                            </div>
                            <div class="col">
                                Address: {{$order->address}}
                            </div>
                        </div>

                    </a>
                </div>

            </div>

        @endforeach

        @if($orders->hasPages())

            <div class="my-3">
                {{ $orders->links() }}
            </div>

        @endif

    @endif

</x-layouts.admin>
