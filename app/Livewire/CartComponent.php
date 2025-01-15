<?php

namespace App\Livewire;

use Auth;
use Livewire\Component;
use App\Models\Order;




class CartComponent extends Component
{
    public $cart = [];

    public $total = 0;

    public $name;
    public $time;
    public $phone;


    public $address;
    public $recibe_alguien_mas;
    public $recibe_yo = false;
    public $nombre_receptor = null;





    public function mount()

    {

        $this->cart = session()->get('cart', []);

        $this->calculateTotal();

    }

    public function removeFromCart($productId)

    {

        if (isset($this->cart[$productId])) {

            unset($this->cart[$productId]);

            session()->put('cart', $this->cart);

            $this->calculateTotal();

            session()->flash('message', 'Product removed from cart.');

        }

    }

    public function updateQuantity($productId, $quantity)

    {

        if (isset($this->cart[$productId]) && $quantity > 0) {

            $this->cart[$productId]['quantity'] = $quantity;

            session()->put('cart', $this->cart);

            $this->calculateTotal();

            session()->flash('message', 'Cart updated successfully.');

        }

    }

    public function confirmOrder()

{
     // Validación
     $this->validate([
        'name' => 'required|string|max:255',
        'address' => 'required|string|max:255',
        'phone' => 'required',

        
        'time' => 'required|string|max:255',

        

        ]);

    if ($this->recibe_alguien_mas && empty($this->nombre_receptor)) {
            session()->flash('error', 'Por favor, ingrese el nombre de la persona que recibirá el pedido.');
            return;
        }

    if (empty($this->cart)) {

        session()->flash('error', 'Cart is empty. Add products to confirm an order.');

        return;

    }

    $orderTotal = 0;

    foreach ($this->cart as $productId => $item) {

        $productTotal = $item['price'] * $item['quantity'];

        $orderTotal += $productTotal;

        $receptor = $this->recibe_yo ? $this->name : $this->nombre_receptor;

        Order::create([

            'product_id' => $productId,

            'quantity' => $item['quantity'],

            'price_per_item' => $item['price'],

            'total_price' => $productTotal,

            'status' => 'pending',

            'time' => $this->time,
            'phone' => $this->phone,


            'name' => $this->name,
            
            'address' => $this->address,
            'receptor' => $receptor,

        ]);

    }

    // Clear the cart after confirming the order

    session()->forget('cart');

    $this->cart = [];

    $this->total = 0;

    session()->flash('message', "Order placed successfully! Your total is $orderTotal. We will notify you once it is approved.");

}

    public function calculateTotal()

    {

        $this->total = array_reduce($this->cart, function ($carry, $item) {

            return $carry + ($item['price'] * $item['quantity']);

        }, 0);

    }

    public function toggleReciboYo()
    {
        if ($this->recibe_yo) {
            $this->recibe_alguien_mas = false;
        }
    }

    // Al hacer clic en "Recibe alguien más", desmarcar "Recibo yo"
    public function toggleRecibeAlguienMas()
    {
        if ($this->recibe_alguien_mas) {
            $this->recibe_yo = false;
        }
    }

    public function render()

    {

        return view('livewire.cart-component', ['cart' => $this->cart, 'total' => $this->total]);

    }
}
