<div>
    <div class="com_card mx-2">
        <h3 class="com_card_title mb-3">Add New Product</h3>

        <form wire:submit.prevent="saveProduct">
          <label for="title" class="form_label">Product Title</label>
          <input type="text" wire:model="title" class="form-input" />

          <label for="" class="form_label mt-2">Category</label>
          <select wire:model="category_id" class="form-input">

            <option value="">Select Category</option>

                @foreach ($categories as $category)

                    <option value="{{ $category->id }}">{{ $category->name }}</option>

                @endforeach

         </select>

          <label for="description" class="form_label mt-2">Description</label>
          <textarea name=""  wire:model="description" class="form-input" id=""></textarea>

          <label for="price" class="form_label mt-2">Price</label>
          <input type="number" wire:model="price" class="form-input" />

          <label for="image" class="form_label mt-2">Product Image</label>
          <input type="file" wire:model="image" class="form-input" />

          <button type="submit" class="btn-one mt-3">Add Product</button>
        </form>
        @if (session()->has('message'))

            <div class="alert alert-success mt-2">{{ session('message') }}</div>

        @endif
      </div>
</div>

