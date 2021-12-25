<?php $v->layout("web/template/assets"); ?>

<div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                <div class="col-lg-7">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Criar Conta!</h1>
                        </div>
                        <?= errors_validation() ?>
                        <form name="login" class="d-flex flex-column" method="POST" action="<?= url("user.store"); ?>">
                            <?= csrf_field(); ?>
                            <div class="form-group row">
                                <div class="col-sm-12 mb-3 mb-sm-0 ">
                                    <input type="text" name="name" class="form-control form-control-user p-2" id="exampleFirstName"
                                           placeholder="Nome">
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="email" name = 'email' class="form-control form-control-user  p-2" id="exampleInputEmail"
                                       placeholder="E-mail">
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="password" name ='password' class="form-control form-control-user  p-2"
                                           id="exampleInputPassword" placeholder="Senha">
                                </div>
                                <div class="col-sm-6">
                                    <input type="password" name="password_confirmation"  class="form-control form-control-user  p-2"
                                           id="exampleRepeatPassword" placeholder="Repita senha">
                                </div>
                            </div>
                            <button class="btn btn-primary btn-user btn-block">
                                Registrar Conta
                            </button>
                        </form>
                        <hr>
                        <div class="text-center">
                            <a class="small text-decoration-none" href="<?= url("login") ?>">já tem uma conta? Conecte-se!</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
