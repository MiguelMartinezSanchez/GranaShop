<x-plantilla>
    <x-slot name="titulo">Administración Productos</x-slot>

    @if(session('success'))
        <div class="alert alert-success text-center">
            {{ session('success') }}
        </div>
    @endif

    <h2 class="text-center">LISTADO DE PRODUCTOS</h2>

    {{-- BOTÓN PDF --}}
    <div class="mb-3 text-center">
        <a href="{{ route('admin.products.pdf') }}" class="btn btn-success">
            Descargar PDF
        </a>
    </div>

    <a href="{{ route('adminProducts.create') }}" class="btn btn-danger">
        Agregar Producto
    </a>

    <div class="table-responsive-sm">
        <table class="table table-hover mt-2">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th>Foto</th>
                    <th>Categoria</th>
                    <th>Marca</th>
                    <th colspan="2">Acciones</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($productos as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->nombre }}</td>
                    <td>{{ $product->precio }}</td>
                    <td><img src="{{ $product->foto }}" width="80"></td>
                    <td>{{ $categoriesNombres[$product->categoria] }}</td>
                    <td>{{ $brandsNombres[$product->marca] }}</td>

                    <td>
                        <a href="{{ route('adminProducts.edit', $product) }}" class="btn btn-warning">Editar</a>
                    </td>

                    <td>
                        <form method="POST" action="{{ route('adminProducts.destroy', $product) }}">
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
            {{ $productos->links() }}
        </div>
    </div>
</x-plantilla>