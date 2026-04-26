<x-plantilla>
    <x-slot name="titulo">GranaShop | Inicio de Sesión</x-slot>

    <div class="container login-container">
        <div class="row">

            <!-- 🔐 LOGIN -->
            <div class="col-md-6 login-form-1">

                <!-- 🔴 ERRORES LOGIN -->
                @if ($errors->any())
                    <div style="color:red; margin-bottom:15px;">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @if ($errors->has('login'))
                    <p style="color:red;">{{ $errors->first('login') }}</p>
                @endif

                <form name="login" action="{{ route('account.comprobar') }}" method="POST">
                    @csrf
                    <h3>Inicio de Sesión</h3>

                    <div class="form-group">
                        <input 
                            type="email" 
                            class="form-control" 
                            name="mailLogin" 
                            placeholder="Correo Electrónico *"
                            value="{{ old('mailLogin') }}" 
                        />
                    </div>

                    <div class="form-group">
                        <input 
                            type="password" 
                            class="form-control" 
                            name="passLogin" 
                            placeholder="Contraseña *" 
                        />
                    </div>

                    <div class="form-group">
                        <input type="submit" class="btnSubmit" value="Iniciar Sesion" />
                    </div>

                    <div class="form-group">
                        <a href="#" class="btnForgetPwd">¿Olvidaste la contraseña?</a>
                    </div>
                </form>
            </div>

            <!-- 📝 REGISTRO -->
            <div class="col-md-6 login-form-2">

                <form name="register" action="{{ route('user.store') }}" method="POST">
                    @csrf
                    <h3>Registro</h3>

                    <div class="form-group">
                        <input 
                            type="text" 
                            class="form-control" 
                            name="nombre" 
                            placeholder="Nombre *"
                            value="{{ old('nombre') }}" 
                        />
                    </div>

                    <div class="form-group">
                        <input 
                            type="text" 
                            class="form-control" 
                            name="apellidos" 
                            placeholder="Apellidos *"
                            value="{{ old('apellidos') }}" 
                        />
                    </div>

                    <div class="form-group">
                        <input 
                            type="email" 
                            class="form-control" 
                            name="mail" 
                            placeholder="Correo Electrónico *"
                            value="{{ old('mail') }}" 
                        />
                    </div>

                    <div class="form-group">
                        <input 
                            type="password" 
                            class="form-control" 
                            name="pass" 
                            placeholder="Contraseña *" 
                        />
                    </div>

                    <!-- 🔴 CONFIRMAR PASSWORD (OBLIGATORIO) -->
                    <div class="form-group">
                        <input 
                            type="password" 
                            class="form-control" 
                            name="pass_confirmation" 
                            placeholder="Confirmar Contraseña *" 
                        />
                    </div>

                    <div class="form-group">
                        <input type="submit" class="btnSubmit" value="Registrarse" />
                    </div>

                    <div class="form-group">
                        <a href="#" class="btnForgetPwd">¿Olvidaste la contraseña?</a>
                    </div>
                </form>
            </div>

        </div>
    </div>

</x-plantilla>