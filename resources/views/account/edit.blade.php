<x-plantilla>
    <x-slot name="titulo">GranaShop | Perfil</x-slot>

    <div class="container bg-white mt-5 mb-5">

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

        <form method="POST" action="{{ route('user.update', $usuario) }}">
            @csrf
            @method("PUT")

            <div class="row">
                <div class="col-md-4 border-right text-center p-3">
                    <img class="rounded-circle mt-3" width="150px"
                        src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg">
                    <h5>{{ $usuario->nombre }}</h5>
                    <p>{{ $usuario->mail }}</p>
                </div>

                <div class="col-md-8 p-3">
                    <h4>Ajustes de Perfil</h4>

                    <div class="row mt-3">
                        <div class="col-md-6">
                            <label>Nombre</label>
                            <input name="nombre" type="text" class="form-control"
                                value="{{ old('nombre', $usuario->nombre) }}">
                        </div>

                        <div class="col-md-6">
                            <label>Apellidos</label>
                            <input name="apellidos" type="text" class="form-control"
                                value="{{ old('apellidos', $usuario->apellidos) }}">
                        </div>
                    </div>

                    <div class="mt-3">
                        <label>Email</label>
                        <input name="mail" type="email" class="form-control"
                            value="{{ old('mail', $usuario->mail) }}">
                    </div>

                    <div class="mt-4 text-center">
                        <button class="btn btn-primary">Guardar cambios</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</x-plantilla>