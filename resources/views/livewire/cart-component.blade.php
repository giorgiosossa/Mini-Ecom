<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-12 col-lg-10">
            <div class="card shadow-sm">
                <div class="card-body">
                    @if (session()->has('message'))
                        <div class="alert alert-success" role="alert">
                            {{ session('message') }}
                        </div>
                    @endif

                    @if (session()->has('error'))
                        <div class="alert alert-danger" role="alert">
                            {{ session('error') }}
                        </div>
                    @endif

                    @if (empty($cart))
                        <div class="alert alert-info" role="alert">
                            El carrito de compra está vacío
                        </div>
                    @else
                        <form class="mb-4">
                            <div class="mb-3">
                                <input type="text" wire:model="name" class="form-control" placeholder="Nombre">
                            </div>
                            <div class="mb-3">
                                <input type="text" wire:model="address" class="form-control" placeholder="Dirección">
                            </div>
                            <div class="mb-3">
                                <input type="text" wire:model="phone" class="form-control" placeholder="Teléfono">
                            </div>
                            <div class="mb-3">
                                <input type="text" wire:model="time" class="form-control" placeholder="Horario de entrega">
                            </div>

                            <div class="mb-3">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="recibo_yo" wire:model="recibe_yo" wire:click="toggleReciboYo">
                                    <label class="form-check-label" for="recibo_yo">Recibo yo</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="recibe_alguien_mas" wire:model="recibe_alguien_mas" wire:click="toggleRecibeAlguienMas">
                                    <label class="form-check-label" for="recibe_alguien_mas">Recibe alguien más</label>
                                </div>
                            </div>

                            <div class="mb-3" x-show="$wire.recibe_alguien_mas">
                                <input type="text" wire:model="nombre_receptor" class="form-control" placeholder="Nombre de quien recibe">
                            </div>
                        </form>

                        <!-- Vista de escritorio -->
                        <div class="d-none d-lg-block">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead class="table-light">
                                        <tr>
                                            <th>Producto</th>
                                            <th>Precio</th>
                                            <th>Cantidad</th>
                                            <th>Total</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($cart as $productId => $item)
                                            <tr>
                                                <td>{{ $item['title'] }}</td>
                                                <td>${{ number_format($item['price'], 2) }}</td>
                                                <td>
                                                    <input type="number" class="form-control form-control-sm" style="width: 70px;"
                                                    wire:model.lazy="cart.{{ $productId }}.quantity" 
                                                    min="1" wire:change="updateQuantity({{ $productId }}, cart.{{ $productId }}.quantity)">
                                                </td>
                                                <td>${{ number_format($item['price'] * $item['quantity'], 2) }}</td>
                                                <td>
                                                    <button class="btn btn-outline-danger btn-sm" wire:click="removeFromCart({{ $productId }})">
                                                        Remover
                                                    </button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr class="table-active">
                                            <th colspan="3" class="text-end">Total:</th>
                                            <td>${{ number_format($total, 2) }}</td>
                                            <td>
                                                <button wire:click="confirmOrder" class="btn btn-primary">
                                                    Confirmar Orden
                                                </button>
                                            </td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>

                        <!-- Vista móvil -->
                        <div class="d-lg-none">
                            @foreach ($cart as $productId => $item)
                                <div class="card mb-3">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $item['title'] }}</h5>
                                        <p class="card-text">
                                            <strong>Precio:</strong> ${{ number_format($item['price'], 2) }}<br>
                                            <strong>Cantidad:</strong>
                                            <input type="number" class="form-control form-control-sm" style="width: 70px;"
                                                    wire:model.lazy="cart.{{ $productId }}.quantity" 
                                                    min="1" wire:change="updateQuantity({{ $productId }}, cart.{{ $productId }}.quantity)">

                                            <br>
                                            <strong>Total:</strong> ${{ number_format($item['price'] * $item['quantity'], 2) }}
                                        </p>
                                        <button class="btn btn-outline-danger btn-sm" wire:click="removeFromCart({{ $productId }})">
                                            Remover
                                        </button>
                                    </div>
                                </div>
                            @endforeach
                            <div class="card mb-3">
                                <div class="card-body">
                                    <h5 class="card-title">Orden</h5>
                                    <p class="card-text">
                                        <strong>Total:</strong> ${{ number_format($total, 2) }}
                                    </p>
                                    <button wire:click="confirmOrder" class="btn btn-primary">
                                        Confirmar Orden
                                    </button>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>