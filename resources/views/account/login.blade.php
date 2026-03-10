<x-plantilla>
    <x-slot name="titulo">GranaShop | Inicio de Sesión</x-slot>

    <div class="container login-container">
        <div class="row">
            <div class="col-md-6 login-form-1">
                <form name="login" action="{{ route('account.comprobar') }}" method="POST">
                    @csrf
                    <h3>Inicio de Sesión</h3>
                    <div class="form-group">
                        <input type="email" class="form-control" name="mailLogin" placeholder="Correo Electrónico *" value="" />
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" name="passLogin" placeholder="Contraseña *" value="" />
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btnSubmit" value="Iniciar Sesion" />
                    </div>
                    <div class="form-group">
                        <a href="#" class="btnForgetPwd" name="botonLogin" value="login">¿Olvidaste la contraseña?</a>
                    </div>
                </form>
            </div>

            <div class="col-md-6 login-form-2">
                <form name="register" action="{{ route('user.store') }}" method="POST">
                    @csrf
                    <h3>Registro</h3>
                    <div class="form-group">
                        <input type="text" class="form-control" name="nombre" placeholder="Nombre *" value="" />
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="apellidos" placeholder="Apellidos *" value="" />
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-control" name="mail" placeholder="Correo Electrónico *" value="" />
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" name="pass" placeholder="Contraseña *" value="" />
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btnSubmit" value="Registrarse" />
                    </div>
                    <div class="form-group">
                        <a href="#" class="btnForgetPwd" value="registro">¿Olvidaste la contraseña?</a>
                    </div>
                </form>
            </div>

        </div>
    </div>

</x-plantilla>