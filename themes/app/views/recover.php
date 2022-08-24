<?php $v->layout("_login"); ?>

<div class="app-content content ">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body">
            <div class="auth-wrapper auth-cover">
                <div class="auth-inner row m-0">
                    <!-- Brand logo--><a class="brand-logo">
                        <img src="<?= url("/shared/logo3.png"); ?>" width="200">
                    </a>
                    <!-- /Brand logo-->
                    <!-- Left Text-->
                    <div class="d-none d-lg-flex col-lg-8 align-items-center p-5">
                        <div class="w-100 d-lg-flex align-items-center justify-content-center px-5"><img
                                    class="img-fluid"
                                    src="https://pixinvent.com/demo/vuexy-html-bootstrap-admin-template/app-assets/images/pages/login-v2-dark.svg"
                                    alt="Login V2"/></div>
                    </div>
                    <!-- /Left Text-->
                    <!-- Login-->
                    <div class="d-flex col-lg-4 align-items-center auth-bg px-2 p-lg-5">
                        <div class="col-12 col-sm-8 col-md-6 col-lg-12 px-xl-2 mx-auto">
                            <h2 class="card-title fw-bold mb-1">Esqueceu sua senha?</h2>
                            <p class="card-text mb-2">Digite seu e-mail para recuperar</p>
                            <form class="auth-login-form mt-2" action="<?= url("/recoverPassword"); ?>">

                              <?= csrf_input(); ?>
                                <input type='hidden' name='action' value="login"/>

                                <div class="mb-1">
                                    <label class="form-label" for="email">E-mail</label>
                                    <input class="form-control" id="email" type="email" name="email"/>
                                </div>


                                <button class="btn btn-primary w-100" tabindex="4">Recuperar</button>
                            </form>

                            <div style="margin-top: 20px">
                                <small>

                                    Esse produto é comercializado com apoio da Hotmart. A plataforma não faz controle
                                    editorial prévio dos
                                    produtos comercializados, nem avalia a tecnicidade e experiência daqueles que os
                                    produzem. A existência de
                                    um produto e sua aquisição, por meio da plataforma, não podem ser consideradas como
                                    garantia de qualidade de
                                    conteúdo e resultado, em qualquer hipótese. Ao adquiri-lo, o comprador declara estar
                                    ciente dessas
                                    informações. Os termos e políticas da Hotmart podem ser acessados aqui, antes mesmo
                                    da conclusão da compra.

                                </small>
                            </div>

                        </div>

                    </div>
                    <!-- /Login-->
                </div>
            </div>
        </div>
    </div>
</div>