<x-plantilla>
    <x-slot name="titulo">GranaShop | {{ $productoSeleccionado->nombre }} </x-slot>
    <!-- VISTA DEL PRODUCTO-->

    <div class="container">
        <div class="row  p-5">
            <div class="col-lg-4 order-lg-2">
                <img class="imgSingleProduct" src="{{ $productoSeleccionado->foto }}">
            </div>
            <div class="col-lg-6 p-5 order-3">
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('products.index') }}">Inicio</a></li>
                        <li class="breadcrumb-item"><a href="{!! URL::previous() !!}">{{ $categoriesNombres[$productoSeleccionado->categoria] }}</a></li>
                        <li class="breadcrumb-item active">{{ $productoSeleccionado->nombre }}</li>
                    </ol>
                </nav>
                <p class="h4">Marca: <a href="{{ route('brands.show', $brandsNombres[$productoSeleccionado->marca]) }}" class="text-decoration-none fw-bold">{{ $brandsNombres[$productoSeleccionado->marca] }}</a></p>
                <p class="fw-bold h3 nombre">{{ $productoSeleccionado->nombre }}</p>
                <p class="h4">desde <span class="precio">{{ $productoSeleccionado->precio }}</span> € <span class="font-italic h5 text-secondary">IVA INCLUIDO</span></p>
                <hr>
                <button type="button" class="storeItem btn btn-primary shop-button">Añadir al carro</button>
            </div>
        </div>
        <h2 class="text-center">Artículos similares</h2>
        <!-- PRODUCTOS SUGERIDOS -->
        <div class="row m-5">
            @foreach ($Productossugeridos as $item)
            <div class="col-6 col-md-4 p-2">
                <div class="card d-relative"> <img class="card-img-top" src="{{ $item->foto }}">
                    <div class="card-body">
                        <h5><b>{{ $item->nombre }}</b> </h5>
                        <div class="d-flex flex-row my-2">
                            <div class="text-muted price">{{ $item->precio }} €</div>
                        </div>
                        <form name="showProduct" action="{{ route('products.singleProduct') }}" class="form-inline ">
                            @csrf
                            <button type="submit" class="btn w-100 rounded my-2">Ver producto</button>
                            <input type="hidden" name="showProduct" value="{{ $item->id }}">
                        </form>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

    </div>
</x-plantilla>