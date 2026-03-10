<x-plantilla>
    <x-slot name="titulo">Editar Marca</x-slot>
    <div class="d-flex justify-content-center text-center p-5">
        <div class="col-md-6 login-form-2">
            <form name="sd" method="POST" enctype="multipart/form-data" action="{{ route('adminBrands.update', $marca) }}">
                @csrf
                @method("PUT")
                @bind($marca)
                <h2 class="m-5">Editar Marca</h2>
                <div class="form-group">
                    <img src="{{ $marca->foto }}">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" value="{{ $marca->nombre }}" name="nombre" placeholder="Nombre *" label="Nombre" />
                </div>
                <div class="form-group">
                    <input class="form-control" id="file-input" name="foto" type="file" />
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" value="{{ $marca->descripcion }}" name="descripcion" placeholder="Descripcion *" label="Descripcion" />
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