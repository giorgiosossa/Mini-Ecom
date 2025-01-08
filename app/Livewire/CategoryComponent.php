<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Category;

class CategoryComponent extends Component
{

    public $name;
    public $categoryId;

    public $categories;
  

    public function mount()

    {

        $this->categories = Category::all();

    }

    public function saveCategory()

    {

        $this->validate(['name' => 'required|string|max:255']);

        Category::create(['name' => $this->name]);

        $this->name = '';

        $this->categories = Category::all();

        session()->flash('message', 'Category added successfully!');

    }

    public function delete(Category $categoryId){

    }

    public function deleteCategory($categoryId)
    {
        // Buscar la categoría por ID
        $category = Category::find($categoryId);

        // Si la categoría existe, eliminarla
        if ($category) {
            $category->delete();

            // Emitir un mensaje de éxito a la vista
            session()->flash('message', 'Categoría eliminada exitosamente!');
        } else {
            // Si no se encuentra, emitir un mensaje de error
            session()->flash('message', 'Categoría no encontrada.');
        }
    }
    

    public function render()

    {

        return view('livewire.category-component', [

            'categories' => $this->categories,

        ])->layout('components.layouts.admin');

    }
}
