<x-plantilla>
    <x-slot name="titulo">Administración Productos</x-slot>

    <h2 class="text-center">LISTADO DE PRODUCTOS</h2>
    <a href="{{ route('adminProducts.create') }}" class="btn btn-danger"><i class="fas fa-plus"></i> Agregar Producto</a>

    <div class="table-responsive-sm">
        <table class="table table-hover mt-2">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Precio</th>
                    <th scope="col">Foto</th>
                    <th scope="col">Categoria ID</th>
                    <th scope="col">Categoria</th>
                    <th scope="col">Marca ID</th>
                    <th scope="col">Marca Nombre</th>
                    <th scope="col" colspan="2" class="text-center">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($productos as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->nombre }}</td>
                    <td>{{ $product->precio }}</td>
                    <td><img src="{{ $product->foto }}" /></td>
                    <td>{{ $product->categoria }}</td>
                    <td>{{ $categoriesNombres[$product->categoria] }}</td>
                    <td>{{ $product->marca}}</td>
                    <td>{{ $brandsNombres[$product->marca] }}</td>

                    <td class="text-center">
                        <a href="{{ route('adminProducts.edit', $product) }}" class="btn btn-danger"><i class="fas fa-edit"></i> Editar</a>
                    </td>
                    <td class="text-center">
                        <form name="as" method="POST" action="{{ route('adminProducts.destroy', $product) }}">
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
            {{ $productos->withQueryString()->links() }}
        </div>
    </div>
</x-plantilla>