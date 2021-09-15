@extends('layouts.app')
@section('title', 'Iniciar sesión')

@section('content')
    
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-7 pt-3 pb-3">
                    <div class="card">
                        <div class="login-box">
                            <div class="card-body px-5 py-5">
                                <ul class="nav nav-pills nav-fill" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="signin-tab-2" data-toggle="tab" href="#signin-2" role="tab" aria-controls="signin-2" aria-selected="false">Iniciar Sesión</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="register-tab-2" data-toggle="tab" href="#register-2" role="tab" aria-controls="register-2" aria-selected="true">Registrarse</a>
                                    </li>
                                </ul>
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="signin-2" role="tabpanel" aria-labelledby="signin-tab-2">
                            <form action="{{ route('login') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="singin-email-2">Correo electrónico *</label>
                                    <input type="text" class="form-control" id="singin-email-2" name="email" required>
                                </div><!-- End .form-group -->

                                <div class="form-group">
                                    <label for="singin-password-2">Contraseña *</label>
                                    <input type="password" class="form-control" id="singin-password-2" name="password" required>
                                </div><!-- End .form-group -->

                                <div class="form-footer">
                                    <button type="submit" class="btn btn-success">
                                        <span>INGRESAR</span>
                                        <i class="far fa-arrow-alt-circle-right"></i>
                                    </button>
                                </div><!-- End .form-footer -->
                            </form>
                        </div><!-- .End .tab-pane -->
                        <div class="tab-pane fade" id="register-2" role="tabpanel" aria-labelledby="register-tab-2">
                            <form action="{{ route('register') }}" method="post">
                                @csrf
                                

                                <div class="form-group">
                                    <label for="register-firstname">Nombre y Apellido *</label>
                                    <input type="text" class="form-control" id="register-firstname" name="name" required>
                                </div><!-- End .form-group -->


                                <div class="form-group">
                                    <label for="register-email">Correo electrónico *</label>
                                    <input type="email" class="form-control" id="register-email" name="email" required>
                                </div><!-- End .form-group -->

                                <div class="form-group">
                                    <label for="register-password">Contraseña *</label>
                                    <input type="password" class="form-control" id="register-password" name="password" required>
                                </div><!-- End .form-group -->

                                <div class="form-group">
                                    <label for="register-c-password">Confirmar contraseña *</label>
                                    <input type="password" class="form-control" id="register-c-password" name="confirm_password" required>
                                </div><!-- End .form-group -->

                                <div class="form-footer">
                                    <button type="submit" class="btn btn-success">
                                        <span>ENVIAR</span>
                                        <i class="icon-long-arrow-right"></i>
                                    </button>
                                </div><!-- End .form-footer -->
                            </form>
                        </div>
                    </div>
                </div><!-- .End .tab-pane -->
            </div><!-- End .tab-content -->
        </div><!-- End .form-tab -->
    </div><!-- End .form-box -->
</div><!-- End .container -->
</div>
@endsection