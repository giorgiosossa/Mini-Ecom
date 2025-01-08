<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;
use App\Models\Category;
use App\Models\Product;

class AddProductComponent extends Component
{
    use WithFileUploads;

    public $title, $description, $price, $image, $categories, $category_id, $productos, $productId;

    public function mount()

    {

        $this->categories = Category::all();
        $this->productos = Product::all();

    }

    public function saveProduct()

    {

        $path = $this->image->store('products', 'public');

        Product::create([

            'title' => $this->title,

            'category_id' => $this->category_id,

            'description' => $this->description,

            'price' => $this->price,

            'image' => $path,

        ]);

        session()->flash('message', 'Product added successfully!');

    }

    public function deleteProduct($productId)
    {
        // Buscar la categoría por ID
        $product = Product::find($productId);

        // Si la categoría existe, eliminarla
        if ($product) {
            $product->delete();

            // Emitir un mensaje de éxito a la vista
            session()->flash('message', 'Producto eliminado exitosamente!');
        } else {
            // Si no se encuentra, emitir un mensaje de error
            session()->flash('message', 'Producto no encontrado.');
        }
    }
    

    public function render()

    {

        return view('livewire.add-product-component')->layout('components.layouts.admin');

    }
}
