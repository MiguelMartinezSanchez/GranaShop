<x-plantilla>
    <x-slot name="titulo">GranaShop | Inicio</x-slot>
    <!-- CARROUSEL DE INICIO -->
    <div class="container">
        <div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="3000">
        @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
            <div class="carousel-inner">
                <div class="item active">
                    <img src="/img/slider/slider-3.png" alt="moda-masculina" style="width:100%;">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Nuevos productos para primavera</h5>
                        <p>Mira los nuevos productos para esta temporada.</p>
                    </div>
                </div>
                <div class="item">
                    <img src="/img/slider/slider-2.jpg" alt="complementos" style="width:100%;">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Nuevos complementos</h5>
                        <p>Complementos de moda urbana.</p>
                    </div>
                </div>
                <div class="item ">
                    <img src="/img/slider/slider-1.jpg" alt="temporada-invierno" style="width:100%;">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Temporada de Invierno disponible</h5>
                        <p>Explora nuestra nueva colección de invierno.</p>
                    </div>
                </div>
                <div class="item">
                    <img src="/img/slider/slider-4.jpg" alt="moda-femenina" style="width:100%;">
                    <div class="carousel-caption d-none d-md-block">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- MOSTRAR CATEGORÍAS EN INICIO -->
    <div class="container mt-5 text-white ">
        <div class="row">
            <div class="col-lg-3 mb-5" id="animado">
                <a href="{{ route('productosCategorie.show', '1' ) }}">
                    <div id="cardsHover" class="scroll bg-image card rounded border-0 text-center justify-content-center" style="background-image: url(/img/categoriasInicio/camisetas.jpg); background-size: cover;">
                        <h1 class="card-text fw-bold">CAMISETAS</h1>
                    </div>
                </a>
            </div>

            <div class="col-lg-3 mb-5" id="animado">
                <a href="{{ route('productosCategorie.show', '2' ) }}">
                    <div id="cardsHover" class="scroll bg-image card rounded border-0 text-center justify-content-center" style="background-image: url(/img/categoriasInicio/pantalones.jpg); background-size: cover;">
                        <h1 class="card-text fw-bold">PANTALONES</h1>
                    </div>
                </a>
            </div>

            <div class="col-lg-3 mb-5" id="animado">
                <a href="{{ route('productosCategorie.show', '3' ) }}">
                    <div id="cardsHover" class="scroll bg-image card rounded border-0 text-center justify-content-center" style="background-image: url(/img/categoriasInicio/complementos.jpg); background-size: cover;">
                        <h1 class="card-text fw-bold">ACCESORIOS</h1>
                    </div>
                </a>
            </div>

            <div class="col-lg-3 mb-5" id="animado">
                <a href="{{ route('productosCategorie.show', '4' ) }}">
                    <div id="cardsHover" class="scroll bg-image card rounded border-0 text-center justify-content-center" style="background-image: url(/img/categoriasInicio/calzado.jpg);background-size: cover;">
                        <h1 class="card-text fw-bold">CALZADO</h1>
                    </div>
                </a>
            </div>
        </div>
    </div>

    <!-- MOSTRAR TODOS LOS PRODUCTOS EN CARDS -->
    <div class="container py-5">
        <h2 class="d-flex justify-content-center mb-5">Artículos Sugeridos</h2>

        <div class="row m-2">
            @foreach ($allProducts as $item)
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

        <!-- GOOGLE MAP -->
        <div class="p-5">
            <h2 class="d-flex justify-content-center">Visítanos en nuestra tienda</h2>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3192.8991752680727!2d-2.4636592848540033!3d36.844890679939354!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd7075ff99071c4b%3A0xf810fcbad8bb3aaf!2zQy4gQ2FwaXTDoW4gR2FyY8OtYSBBbmTDumphciwgMjMsIDEsIDA0MDAzIEFsbWVyw61h!5e0!3m2!1ses!2ses!4v1638469110195!5m2!1ses!2ses" width="100%" height="100%" style="border:0; border-radius: 10px" allowfullscreen="" loading="lazy"></iframe>
        </div>
    </div>

</x-plantilla>