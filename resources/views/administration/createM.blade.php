<x-plantilla>
    <x-slot name="titulo">Agregar Marca</x-slot>

    <div class="d-flex justify-content-center text-center p-5">
        <div class="col-md-6 login-form-2">

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('adminBrands.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <h2 class="m-5">Agregar Marca</h2>

                {{-- NOMBRE --}}
                <div class="form-group">
                    <input type="text" name="nombre" class="form-control" placeholder="Nombre *" value="{{ old('nombre') }}">
                    @error('nombre') <div class="text-danger">{{ $message }}</div> @enderror
                </div>

                {{-- FOTO --}}
                <div class="form-group">
                    <input type="file" name="foto" class="form-control">
                    @error('foto') <div class="text-danger">{{ $message }}</div> @enderror
                </div>

                {{-- DESCRIPCION --}}
                <div class="form-group">
                    <input type="text" name="descripcion" class="form-control" placeholder="Descripcion *" value="{{ old('descripcion') }}">
                    @error('descripcion') <div class="text-danger">{{ $message }}</div> @enderror
                </div>

                <div class="form-group m-5">
                    <input type="submit" class="btnSubmit" value="Agregar">
                    <button type="reset" class="ml-3 btn btn-danger">Limpiar</button>
                    <a href="{{ url()->previous() }}" class="ml-3 btn btn-danger">Volver</a>
                </div>

            </form>
        </div>
    </div>
</x-plantilla>