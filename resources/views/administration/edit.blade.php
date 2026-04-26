<x-plantilla>
    <x-slot name="titulo">Editar Producto</x-slot>

    <div class="d-flex justify-content-center p-5">
        <div class="col-md-6">

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" enctype="multipart/form-data"
                action="{{ route('adminProducts.update', $producto) }}">
                @csrf
                @method("PUT")

                <h2 class="mb-4">Editar Producto</h2>

                <img src="{{ asset('storage/'.$producto->foto) }}" width="120">

                <input type="text" name="nombre" class="form-control mt-3"
                    value="{{ old('nombre', $producto->nombre) }}">

                <input type="number" step="0.01" name="precio" class="form-control mt-3"
                    value="{{ old('precio', $producto->precio) }}">

                <input type="file" name="foto" class="form-control mt-3">

                <select name="marca" class="form-control mt-3">
                    @foreach ($brandsNombres as $item)
                        <option value="{{ $item->id }}"
                        {{ old('marca', $producto->marca) == $item->id ? 'selected' : '' }}>
                            {{ $item->nombre }}
                        </option>
                    @endforeach
                </select>

                <select name="categoria" class="form-control mt-3">
                    @foreach ($categoriesNombres as $item)
                        <option value="{{ $item->id }}"
                        {{ old('categoria', $producto->categoria) == $item->id ? 'selected' : '' }}>
                            {{ $item->nombre }}
                        </option>
                    @endforeach
                </select>

                <div class="mt-4">
                    <button class="btn btn-primary">Guardar</button>
                    <a href="{{ url()->previous() }}" class="btn btn-danger">Volver</a>
                </div>
            </form>
        </div>
    </div>
</x-plantilla>