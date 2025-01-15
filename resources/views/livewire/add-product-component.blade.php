<div>
    <div class="com_card mx-2">
        <h3 class="com_card_title mb-3">Agregar producto nuevo</h3>

        <form wire:submit.prevent="saveProduct">
          <label for="title" class="form_label">Nombre del producto</label>
          <input type="text" wire:model="title" class="form-input" />

          <label for="" class="form_label mt-2">Categoria</label>
          <select wire:model="category_id" class="form-input">

            <option value="">Seleccionar Categoria</option>

                @foreach ($categories as $category)

                    <option value="{{ $category->id }}">{{ $category->name }}</option>

                @endforeach

         </select>

          <label for="description" class="form_label mt-2">Descripción</label>
          <textarea name=""  wire:model="description" class="form-input" id=""></textarea>

          <label for="price" class="form_label mt-2">Precio</label>
          <input type="number" wire:model="price" class="form-input" />

          <label for="image" class="form_label mt-2">Imagen del producto</label>
          <input type="file" wire:model="image" class="form-input" />

          <button type="submit" class="btn-one mt-3">Añadir producto</button>
        </form>
        @if (session()->has('message'))

            <div class="alert alert-success mt-2">{{ session('message') }}</div>

        @endif
      </div>

      <!-- categories table -->

      <div class="com_card mx-2">
        <h3 class="com_card_title mb-3">Todos mis productos</h3>

        <div class="table-responsive">
          <table class="data-table">
            <thead>
              <tr>
                <th>ID</th>
                <th>Nombre</th>
                
                <th></th>
              </tr>
            </thead>

            <tbody>
                @foreach ($productos as $product)
              <tr>
                <td>{{ $product->id }}</td>
                <td>{{ $product->title}}</td>
               

                <td>
                    <button  type="submit"
                    
                        wire:click="deleteProduct({{ $product->id }})" 
                        class="btn btn-danger" 
                        onclick="return confirm('¿Estás seguro de eliminar esta categoría?')">
                        Eliminar Producto
                    </button>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
</div>

