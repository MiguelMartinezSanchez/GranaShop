<x-plantilla>
    <x-slot name="titulo">Agregar Producto</x-slot>
    <div class="d-flex justify-content-center text-center p-5">
        <div class="col-md-6 login-form-2">
            <form name="dsaw" action="{{ route('adminProducts.store') }}" enctype="multipart/form-data" method="POST">
                @csrf
                <h2 class="m-5">Agregar Producto</h2>
                <div class="form-group">
                    <input type="text" class="form-control" name="nombre" placeholder="Nombre *" value="" required />
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="precio" placeholder="Precio *" value="" required />
                </div>
                <div class="form-group">
                    <input class="form-control" id="file-input" name="foto" type="file" required />
                </div>
                <div class="form-group">
                    <select name="marca" class="form-control" required>
                        <option value="null">--- Marca</option>
                        @foreach ( $brandsNombres as $item )
                        <option value="{{ $item->id }}">{{ $item->nombre }}</option>
                        @endforeach
                    </select>
                </div>
                <div name="categoria" class="form-group">
                    <select name="categoria" class="form-control" required>
                        <option value="null">--- Categoria</option>
                        @foreach ( $categoriesNombres as $item )
                        <option value="{{ $item->id }}">{{ $item->nombre }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group m-5">
                    <input type="submit" class="btnSubmit" value="Agregar" />
                    <button type="reset" class=" ml-3 btn btn-danger"><i class="fas fa-broom"></i> Limpiar</button>
                    <a href="{{ url()->previous() }}" class="ml-3 btn btn-danger"><i class="fas fa-backward"></i>
                        Volver</a>
                </div>
            </form>
        </div>
    </div>
</x-plantilla>