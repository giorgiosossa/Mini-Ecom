<div>
    <!-- add cat form -->
    <div class="com_card mx-2">
        <h3 class="com_card_title mb-3">Agregar nueva Categoria</h3>

        <form wire:submit.prevent="saveCategory" >
          <label for="name" class="form_label" >Nombre de la categoria</label>
          <input type="text" wire:model="name" class="form-input" />

          <button type="submit" class="btn-one mt-3">Añadir</button>
        </form>
        @if (session()->has('message'))

            <div class="alert alert-success mt-2">{{ session('message') }}</div>

        @endif
      </div>

      <!-- categories table -->

      <div class="com_card mx-2">
        <h3 class="com_card_title mb-3">Todas tus categorias</h3>

        <div class="table-responsive">
          <table class="data-table">
            <thead>
              <tr>
                <th>ID</th>
                <th>Nombre </th>
                <th></th>
              </tr>
            </thead>

            <tbody>
                @foreach ($categories as $category)
              <tr>
                <td>{{ $category->id }}</td>
                <td>{{ $category->name }}</td>
                <td>
                    <button  type="submit"
                    
                        wire:click="deleteCategory({{ $category->id }})" 
                        class="btn btn-danger" 
                        onclick="return confirm('¿Estás seguro de eliminar esta categoría?')">
                        Eliminar Categoría
                    </button>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
</div>

