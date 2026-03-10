<x-plantilla>
    <x-slot name="titulo">Agregar Marca</x-slot>
    <div class="d-flex justify-content-center text-center p-5">
        <div class="col-md-6 login-form-2">
            <form name="dsaw" action="{{ route('adminBrands.store') }}" enctype="multipart/form-data" method="POST">
                @csrf
                <h2 class="m-5">Agregar Marca</h2>
                <div class="form-group">
                    <input type="text" class="form-control" name="nombre" placeholder="Nombre *" value="" />
                </div>
                <div class="form-group">
                    <input class="form-control" id="file-input" name="foto" type="file" />
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="descripcion" placeholder="Descripcion *" value="" />
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