<x-plantilla>
    <x-slot name="titulo">GranaShop | {{ $categoriesNombres[$productos[0]->categoria] }} </x-slot>

    <div class="filter"> <button class="btn btn-default" type="button" data-toggle="collapse" data-target="#mobile-filter" aria-expanded="true" aria-controls="mobile-filter">Filtros<span class="fa fa-filter pl-1"></span></button>
    </div>
    <div id="mobile-filter">
        <p class="pl-sm-0 pl-2"> Inicio | <b>{{ $categoriesNombres[$productos[0]->categoria] }}</b></p>
        <div class="border-bottom pb-2 ml-2">
            <h4 id="burgundy">Filtros</h4>
        </div>
        <div class="py-2 border-bottom ml-3">
            <h6 class="font-weight-bold">Precio</h6>
            <div id="orange"><span class="fa fa-minus"></span></div>
                    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
            <form name="wddd" action="{{ route('products.filtroPrecio') }}" class="form-inline">
                @csrf
                <div class="input-group mb-3">
                    <input type="hidden" name="categoria" value="{{ $productos[0]->categoria }}">
                    <select name="precio" class="custom-select btn w-100 rounded my-2" id="inputGroupSelect01" onchange="this.form.submit()">
                        <option selected>Selecciona</option>
                        <option value="DESC">De mayor a menor</option>
                        <option value="ASC">De menor a mayor</option>
                    </select>
                </div>
            </form>
        </div>
        <div class="py-2 border-bottom ml-3">
            <h6 class="font-weight-bold">Marcas</h6>
            <div id="orange"><span class="fa fa-minus"></span></div>
            <form name="search" action="{{ route('productosCategorie.show', $productos[0]->categoria ) }}" class="form-inline">
                @csrf
                <select name="marca" class=" btn w-100 rounded my-2" onchange="this.form.submit()">
                    <option value="null">Selecciona</option>
                    @foreach ( $marcas as $item )
                    <option value="{{ $item->id }}">{{ $brandsNombres[$item->id] }}</option>
                    @endforeach
                </select>
            </form>
        </div>
        <div class="py-2 border-bottom ml-3">
            <h6 class="font-weight-bold">Tallas</h6>
            <div id="orange"><span class="fa fa-minus"></span></div>
            <form>
                <div class="form-group"> <input type="checkbox" id="clothingSizeS"> <label for="clothingSizeS">S</label> </div>
                <div class="form-group"> <input type="checkbox" id="clothingSizeM"> <label for="clothingSizeM">M</label> </div>
                <div class="form-group"> <input type="checkbox" id="clothingSizeL"> <label for="clothingSizeL">L</label> </div>
                <div class="form-group"> <input type="checkbox" id="clothingSizeXL"> <label for="clothingSizeXL">XL</label> </div>
                <div class="form-group"> <input type="checkbox" id="clothingSizeXXL"> <label for="clothingSizeXXL">XXL</label> </div>
            </form>
        </div>
    </div>
    <!-- Sidebar filter section -->
    <section id="sidebar">
        <p> Inicio | <b>{{ $categoriesNombres[$productos[0]->categoria] }}</b></p>
        <div class="border-bottom pb-2 ml-2">
            <h4 id="burgundy">Filtros</h4>
        </div>
        <div class="py-2 border-bottom ml-3">
            <h6 class="font-weight-bold">Precio</h6>
            <div id="orange"><span class="fa fa-minus"></span></div>
            <form name="wds" action="{{ route('products.filtroPrecio') }}" class="form-inline">
                @csrf
                <div class="input-group mb-3">
                    <input type="hidden" name="categoria" value="{{ $productos[0]->categoria }}">
                    <select name="precio" class="custom-select btn w-100 rounded my-2" id="inputGroupSelect01" onchange="this.form.submit()">
                        <option selected>Selecciona</option>
                        <option value="DESC">De mayor a menor</option>
                        <option value="ASC">De menor a mayor</option>
                    </select>
                </div>
            </form>
        </div>
        <div class="py-2 border-bottom ml-3">
            <h6 class="font-weight-bold">Marcas</h6>
            <div id="orange"><span class="fa fa-minus"></span></div>
            <form name="search" action="{{ route('productosCategorie.show', $productos[0]->categoria ) }}" class="form-inline">
                @csrf
                <select name="marca" class=" btn w-100 rounded my-2" onchange="this.form.submit()">
                    <option value="null">Selecciona</option>
                    @foreach ( $marcas as $item )
                    <option value="{{ $item->id }}">{{ $brandsNombres[$item->id] }}</option>
                    @endforeach
                </select>
            </form>
        </div>
        <div class="py-2 border-bottom ml-3">
            <h6 class="font-weight-bold">Tallas</h6>
            <div id="orange"><span class="fa fa-minus"></span></div>
            <form>
                <div class="form-group"> <input type="checkbox" id="clothingSizeS"> <label for="clothingSizeS">S</label> </div>
                <div class="form-group"> <input type="checkbox" id="clothingSizeM"> <label for="clothingSizeM">M</label> </div>
                <div class="form-group"> <input type="checkbox" id="clothingSizeL"> <label for="clothingSizeL">L</label> </div>
                <div class="form-group"> <input type="checkbox" id="clothingSizeXL"> <label for="clothingSizeXL">XL</label> </div>
                <div class="form-group"> <input type="checkbox" id="clothingSizeXXL"> <label for="clothingSizeXXL">XXL</label> </div>
            </form>
        </div>
    </section>
    <!-- products section -->
    <section id="products">
        <div class="container">
            <div class="d-flex flex-row">
                <div class="text-muted m-2" id="res">Mostrando {{ count($productos) }} resultados</div>
            </div>

            <div class="row m-2">
                @foreach ($productos as $item)
                <div class="col-6 col-md-4 p-2">
                    <div class="card d-relative"> <img class="card-img-top" src="{{ $item->foto }}">
                        <div class="card-body">
                            <span><a href="{{ route('brands.show', $brandsNombres[$item->marca]) }}" class="text-decoration-none fw-bold"> {{ $brandsNombres[$item->marca] }} </a></span>
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
        <div class="m-5 text-center">
            {{ $productos->withQueryString()->links() }}
        </div>
    </section>
    <script src="js/main.js"></script>
</x-plantilla>