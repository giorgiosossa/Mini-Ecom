<div class="container mx-auto px-4 py-8">
  <div class="bg-white rounded-lg shadow-md overflow-hidden">
      <div class="p-6">
          <h3 class="text-2xl font-semibold text-gray-800 mb-6">All Orders</h3>

          <!-- Desktop Table View -->
          <div class="hidden md:block">
              <table class="min-w-full divide-y divide-gray-200">
                  <thead class="bg-gray-50">
                      <tr>
                          
                          <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nombre</th>
                          <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Teléfono</th>

                          <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Dirección</th>
                          <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Hora</th>

                          <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Producto</th>
                          <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Cantidad</th>
                        
                          <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Precio total</th>
                          <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                          <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Action</th>
                      </tr>
                  </thead>
                  <tbody class="bg-white divide-y divide-gray-200">
                      @foreach ($orders as $order)
                          <tr class="hover:bg-gray-50 transition-colors duration-200">
                              
                              <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $order->name }}</td>
                              <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $order->phone }}</td>


                              <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $order->address }}</td>
                              <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $order->time }}</td>


                              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $order->product->title }}</td>
                              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $order->quantity }}</td>
                              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">${{ number_format($order->total_price, 2) }}</td>
                              <td class="px-6 py-4 whitespace-nowrap">
                                  <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                                      @if($order->status === 'Realizado') bg-green-100 text-green-800
                                      @elseif($order->status === 'Pendiente') bg-yellow-100 text-yellow-800
                                      @else bg-red-100 text-red-800
                                      @endif">
                                      {{ $order->status }}
                                  </span>
                              </td>
                              <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                  
                                  <button wire:click="cancelOrder({{ $order->id }})" class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded transition duration-200 ease-in-out transform hover:scale-105">
                                      Realizado
                                  </button>
                              </td>
                          </tr>
                      @endforeach
                  </tbody>
              </table>
          </div>

          <!-- Mobile Card View -->
          <div class="md:hidden space-y-6">
              @foreach ($orders as $order)
                  <div class="bg-white shadow-md rounded-lg overflow-hidden"> 
                      <div class="p-4 border-b">
                        <p class="text-sm text-gray-600   ">Order #{{ $order->id }}</p>
                        <h4 class="text-lg font-semibold text-gray-800">Teléfono: {{ $order->phone }}</h4>
                        <p class="text-sm text-gray-600   ">A nombre de:{{ $order->name }}</p>

                          <p class="text-sm text-gray-600 ">Para: {{ $order->address }}</p>
                          <p class="text-sm text-gray-600">{{ $order->product->title }}</p>
                          
                      </div>
                      <div class="p-4 space-y-2">
                          <div class="flex justify-between">
                              <span class="text-sm text-gray-600">Cantidad:</span>
                              <span class="text-sm font-medium text-gray-900">{{ $order->quantity }}</span>
                          </div>
                          <div class="flex justify-between">
                              <span class="text-sm text-gray-600">Precio por producto</span>
                              <span class="text-sm font-medium text-gray-900">${{ number_format($order->price_per_item, 2) }}</span>
                          </div>
                          <div class="flex justify-between">
                              <h4 class="text-lg text-gray-600 bold">Precio total:</h4>
                              <h4 class="text-lg font-medium text-gray-900">${{ number_format($order->total_price, 2) }}</h4>
                          </div>
                          
                      </div>
                      
                  </div>
              @endforeach
          </div>
      </div>
  </div>
</div>