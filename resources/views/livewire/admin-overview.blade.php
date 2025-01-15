<div class="row mx-2">
    <div class="col-lg-4">
      <div class="dashstat">
        <i class="fa-solid fa-cart-shopping"></i>
        <div class="dashstat_content">
          <h3>{{ $totalOrders }}</h3>
          <p>Total Ordenes</p>
        </div>
      </div>
    </div>

    <div class="col-lg-4">
      <div class="dashstat">
        <i class="fa-solid fa-tag"></i>
        <div class="dashstat_content">
          <h3>{{ $totalProducts }}</h3>
          <p>Total Productos</p>
        </div>
      </div>
    </div>

    <div class="col-lg-4">
      <div class="dashstat">
        <i class="fa-solid fa-list-ul"></i>
        <div class="dashstat_content">
          <h3>{{ $totalCategories }}</h3>
          <p>Total Categorias</p>
        </div>
      </div>
    </div>

    <div class="navicards mx-2">
      <div class="row">
        <div class="col-lg-6">
          <a href="{{route('admin.orders')}}">
            <div class="navcard">
              <div class="nc_left">
                <i class="fa-solid fa-cart-shopping"></i>
                <p>Ver historial de ventas</p>
              </div>

              <div class="nc_right">
                <i class="fa-solid fa-arrow-right-long"></i>
              </div>
            </div>
          </a>
        </div>

        <div class="col-lg-6">
          <a href="{{route('admin.add-product')}}">
            <div class="navcard">
              <div class="nc_left">
                <i class="fa-solid fa-tag"></i>
                <p>Añadir nuevo producto</p>
              </div>

              <div class="nc_right">
                <i class="fa-solid fa-arrow-right-long"></i>
              </div>
            </div>
          </a>
        </div>
      </div>
     </div>
  </div>