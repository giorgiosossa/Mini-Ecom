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
                          Your cart is empty.
                      </div>
                  @else
                      <div class="table-responsive">
                        <label for="name" class="form_label">Nombre</label>
                        <input type="text" wire:model="name" class="form-input" />
                        <label for="address" class="form_label">Dirección</label>
                        <input type="text" wire:model="address" class="form-input" />
                          <table class="table table-hover">
                              <thead class="table-light">
                                  <tr>
                                      <th>Product</th>
                                      <th>Price</th>
                                      <th>Quantity</th>
                                      <th>Total</th>
                                      <th>Action</th>
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
                                                  <i class="bi bi-trash"></i> Remove
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
                                              <i class="bi bi-check2-circle"></i> Confirm Order
                                          </button>
                                      </td>
                                  </tr>
                              </tfoot>
                          </table>
                      </div>
                  @endif
              </div>
          </div>
      </div>
  </div>
</div>