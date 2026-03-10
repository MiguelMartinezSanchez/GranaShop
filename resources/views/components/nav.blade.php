<nav class="navbar navbar-expand-md navbar-light">
  <a class="navbar-brand text-uppercase" href="{{ route('products.productosIndex') }}"><span class="border-red pe-2">Grana</span><span class="text-danger">Shop</span></a>
  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#myNav" aria-controls="myNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="fas fa-bars"></span>
  </button>
  <div class="collapse navbar-collapse" id="myNav">
    <div class="navbar-nav text-center">
      <!-- CATEGORIAS -->
      <a class="nav-link active" aria-current="page" href="{{ route('products.productosIndex') }}">Inicio</a>
      <a class="nav-link" href="{{ route('productosCategorie.show', '1' ) }}">Camisetas</a>
      <a class="nav-link" href="{{ route('productosCategorie.show', '2' ) }}">Pantalones</a>
      <a class="nav-link" href="{{ route('productosCategorie.show', '3' ) }}">Calzado</a>
      <a class="nav-link" href="{{ route('productosCategorie.show', '4' ) }}">Complementos</a>

      <!-- ICONO CUENTA-->
      @if (session('user') !=null)
      <li class="nav-item dropdown">
        <span class="nav-link dropdown-toggle" height="70px" width="70px" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="far fa-user-circle"><span class="m-1"></i>{{session('user')}}</span>
        </span>
        <div class="dropdown-menu" aria-labelledby="navbarCollapse">
          <a class="dropdown-item nav-link" href="{{ route('account.logout') }}" onclick="localStorage.clear();">Cerrar Sesión <i class="fas fa-sign-out-alt"></i></a>
          <a class="dropdown-item nav-link" href="{{ route('user.edit', '0' ) }}">Perfil <i class="fas fa-id-card"></i></a>
        </div>
      </li>
      @else
      <a class="nav-link" href="{{ route('user.index') }}" id="login"><i class="far fa-user-circle"><span class="m-1">Login</span></i></a>
      @endif
      <!-- CARRO COMPRA DROPDOWN -->
      <li class="nav-item dropdown mx-auto">
        <span class="nav-link dropdown-toggle" height="70px" width="70px" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-cart-plus"></i></span>
        <div id="carrito" class="dropdown-menu p-3" aria-labelledby="navbarCollapse">
          <table id="lista-carrito" class="table">
            <tbody>
            </tbody>
          </table>
          <p id="carroVacio" class="text-center">Carrito Vacio</p>
          <div class="row">
            <!-- VACIAR CARRITO -->
            <div class="col-md-6"><a href="#" id="boton-vaciar" class="btn btn-primary btn-block border-0"><i class="fas fa-trash-alt"> </i> Vaciar carrito</a></div>
          </div>
        </div>
      </li>
      <!-- PANTALLA CONFIRMAR PRODUCTOS PARA REALZIAR PEDIDO -->
      <a class="nav-link" href="{{ route('products.pantallaCompra') }}"><i class="fas fa-credit-card"></i></a>

      <!-- DROPDOWN DE ADMINISTRACION SOLO PARA ADMIN -->
      @if (session('tipoUsuario') == 1)
      <li class="nav-item dropdown">
        <span class="nav-link dropdown-toggle" height="70px" width="70px" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-user-lock"></i> ADMIN</span>
        </span>
        <div class="dropdown-menu " aria-labelledby="navbarCollapse">
          <a class="dropdown-item nav-link" href="{{ route('adminProducts.index') }}">Productos <i class="fab fa-product-hunt"></i></a>
          <a class="dropdown-item nav-link" href="{{ route('adminBrands.index') }}">Marcas <i class="fab fa-medium-m"></i></a>
        </div>
      </li>
      @endif
    </div>
  </div>
</nav>