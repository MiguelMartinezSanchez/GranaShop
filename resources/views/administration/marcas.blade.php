<x-plantilla>
    <x-slot name="titulo">Administración Marcas</x-slot>

    <h2 class="text-center">LISTADO DE MARCAS</h2>
    <a href="{{ route('adminBrands.create') }}" class="btn btn-danger"><i class="fas fa-plus"></i> Agregar Marca</a>
    <div class="table-responsive-sm">
        <table class="table table-hover mt-2">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Foto</th>
                    <th scope="col">Descripcion</th>
                    <th scope="col" colspan="2" class="text-center">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($marcas as $marca)
                <tr>
                    <td>{{ $marca->id }}</td>
                    <td>{{ $marca->nombre }}</td>
                    <td><img src="{{ $marca->foto }}" /></td>
                    <td>{{ $marca->descripcion }}</td>

                    <td class="text-center">
                        <a href="{{ route('adminBrands.edit', $marca) }}" class="btn btn-danger"><i class="fas fa-edit"></i> Editar</a>
                    </td>
                    <td class="text-center">
                        <form name="as" method="POST" action="{{ route('adminBrands.destroy', $marca) }}">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i>
                                Borrar</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="m-5 text-center">
            {{ $marcas->withQueryString()->links() }}
        </div>
    </div>
</x-plantilla>