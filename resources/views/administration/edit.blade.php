<x-plantilla>
    <x-slot name="titulo">Editar Producto</x-slot>
    <div class="d-flex justify-content-center text-center p-5">
        <div class="col-md-6 login-form-2">
            <form name="sd" method="POST" enctype="multipart/form-data" action="{{ route('adminProducts.update', $producto) }}">
                @csrf
                @method("PUT")
                @bind($producto)
                <h2 class="m-5">Editar Producto</h2>
                <div class="form-group">
                    <img src="{{ $producto->foto }}">
                </div>
                <div class="form-group">
                    <input type="text" value="{{$producto->nombre}}" class="form-control" name="nombre" placeholder="Nombre *" label="Nombre" />
                </div>
                <div class="form-group">
                    <input type="text" value="{{$producto->precio}}" class="form-control" name="precio" placeholder="Precio *" label="Precio" />
                </div>
                <div class="form-group">
                    <input class="form-control" id="file-input" name="foto" type="file" />
                </div>
                <div class="form-group ">
                    <select name="marca" class="form-control">
                        <option value="null">--- Marca</option>
                        @foreach ( $brandsNombres as $item )
                        @if ($item->id == $producto->marca)
                        <option value="{{ $item->id }}" selected>{{ $item->nombre }}</option>
                        @else
                        <option value="{{ $item->id }}">{{ $item->nombre }}</option>
                        @endif
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <select name="categoria" class="form-control">
                        <option value="null">--- Categoria</option>
                        @foreach ( $categoriesNombres as $item )
                        @if ($item->id == $producto->categoria)
                        <option value="{{ $item->id }}" selected>{{ $item->nombre }}</option>
                        @else
                        <option value="{{ $item->id }}">{{ $item->nombre }}</option>
                        @endif
                        @endforeach
                    </select>
                </div>

                <div class="form-group m-5">
                    <input type="submit" class="btnSubmit" value="Editar" />
                    <button type="reset" class=" ml-3 btn btn-danger"><i class="fas fa-broom"></i> Limpiar</button>
                    <a href="{{ url()->previous() }}" class="ml-3 btn btn-danger"><i class="fas fa-backward"></i>
                        Volver</a>
                </div>
            </form>
        </div>
    </div>
</x-plantilla>