<x-plantilla>
    <x-slot name="titulo">GranaShop | Perfil</x-slot>

    <div class="container align-content-center bg-white mt-5 mb-5">
        <form name="sd" method="POST" action="{{ route('user.update', $usuario) }}">
            @csrf
            @method("PUT")
            <div class="row">
                <div class="col-md-4 border-right">
                    <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                        <img class="rounded-circle mt-5" width="150px" src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg">
                        <span class="font-weight-bold">{{ $usuario->nombre }}</span>
                        <span class="text-black-50">{{ $usuario->mail }}</span>
                    </div>
                </div>
                <div class="col-md-7 border-right">
                    <div class="p-3 py-5">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h4 class="text-right">Ajustes de Perfil</h4>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-6"><label class="labels">Nombre</label><input name="nombre" value="{{ $usuario->nombre }}" type="text" class="form-control"></div>
                            <div class="col-md-6"><label class="labels">Apellidos</label><input name="apellidos" value="{{ $usuario->apellidos }}" type="text" class="form-control"></div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-12"><label class="labels">Correo Electrónico</label><input name="mail" value="{{ $usuario->mail }}" type="text" class="form-control"></div>
                        </div>
                        <div class="mt-5 text-center"><button class="btn btn-primary profile-button" type="submit">Save Profile</button></div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</x-plantilla>