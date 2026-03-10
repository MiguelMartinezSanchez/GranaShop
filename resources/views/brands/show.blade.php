<x-plantilla>
    <x-slot name="titulo">GranaShop | {{ $marca->nombre }}</x-slot>

    <div class="container">
        <div class="row marcas m-4 bg-dark">
            <div class="col-md-4">
                <img class="m-5" src="{{ $marca->foto }}" />
            </div>

            <div class="col-md-8 p-5 text-center">
                <p class="fw-bold text-white m-5">{{ $marca->descripcion }}</p>
            </div>
        </div>

        <div class="row m-5">
            @foreach ($productos as $item)
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