<x-plantilla>
    <x-slot name="titulo">Administración Marcas</x-slot>

    @if(session('success'))
        <div class="alert alert-success text-center">
            {{ session('success') }}
        </div>
    @endif

    <h2 class="text-center">LISTADO DE MARCAS</h2>

    {{-- BOTÓN PDF --}}
    <div class="mb-3 text-center">
        <a href="{{ route('admin.brands.pdf') }}" class="btn btn-success">
            Descargar PDF
        </a>
    </div>

    <a href="{{ route('adminBrands.create') }}" class="btn btn-danger">
        Agregar Marca
    </a>

    <div class="table-responsive-sm">
        <table class="table table-hover mt-2">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Foto</th>
                    <th>Descripcion</th>
                    <th colspan="2" class="text-center">Acciones</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($marcas as $marca)
                <tr>
                    <td>{{ $marca->id }}</td>
                    <td>{{ $marca->nombre }}</td>
                    <td><img src="{{ $marca->foto }}" width="80"></td>
                    <td>{{ $marca->descripcion }}</td>

                    <td>
                        <a href="{{ route('adminBrands.edit', $marca) }}" class="btn btn-warning">Editar</a>
                    </td>

                    <td>
                        <form method="POST" action="{{ route('adminBrands.destroy', $marca) }}">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger">Borrar</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div class="text-center">
            {{ $marcas->links() }}
        </div>
    </div>
</x-plantilla>