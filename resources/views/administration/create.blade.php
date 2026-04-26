<x-plantilla>
    <x-slot name="titulo">Agregar Producto</x-slot>

    <div class="d-flex justify-content-center text-center p-5">
        <div class="col-md-6 login-form-2">

            {{-- ERRORES --}}
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('adminProducts.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <h2 class="m-5">Agregar Producto</h2>

                {{-- NOMBRE --}}
                <div class="form-group">
                    <input type="text" name="nombre" class="form-control" placeholder="Nombre *" value="{{ old('nombre') }}">
                    @error('nombre') <div class="text-danger">{{ $message }}</div> @enderror
                </div>

                {{-- PRECIO --}}
                <div class="form-group">
                    <input type="number" step="0.01" name="precio" class="form-control" placeholder="Precio *" value="{{ old('precio') }}">
                    @error('precio') <div class="text-danger">{{ $message }}</div> @enderror
                </div>

                {{-- FOTO --}}
                <div class="form-group">
                    <input type="file" name="foto" class="form-control">
                    @error('foto') <div class="text-danger">{{ $message }}</div> @enderror
                </div>

                {{-- MARCA --}}
                <div class="form-group">
                    <select name="marca" class="form-control">
                        <option value="">--- Marca</option>
                        @foreach ($brandsNombres as $item)
                            <option value="{{ $item->id }}" {{ old('marca') == $item->id ? 'selected' : '' }}>
                                {{ $item->nombre }}
                            </option>
                        @endforeach
                    </select>
                    @error('marca') <div class="text-danger">{{ $message }}</div> @enderror
                </div>

                {{-- CATEGORIA --}}
                <div class="form-group">
                    <select name="categoria" class="form-control">
                        <option value="">--- Categoria</option>
                        @foreach ($categoriesNombres as $item)
                            <option value="{{ $item->id }}" {{ old('categoria') == $item->id ? 'selected' : '' }}>
                                {{ $item->nombre }}
                            </option>
                        @endforeach
                    </select>
                    @error('categoria') <div class="text-danger">{{ $message }}</div> @enderror
                </div>

                {{-- BOTONES --}}
                <div class="form-group m-5">
                    <input type="submit" class="btnSubmit" value="Agregar">
                    <button type="reset" class="ml-3 btn btn-danger">Limpiar</button>
                    <a href="{{ url()->previous() }}" class="ml-3 btn btn-danger">Volver</a>
                </div>

            </form>
        </div>
    </div>
</x-plantilla>