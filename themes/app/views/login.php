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
                            <h2 class="card-title fw-bold mb-1">Bem-vindo ao Personal Edu Behring! 👋</h2>
                            <p class="card-text mb-2">Faça login na sua conta e comece a se exercitar.</p>
                            <form class="auth-login-form mt-2" action="<?= url("/login"); ?>" method="POST">

                                <input type='hidden' name='action' value="login"/>

                                <div class="mb-1">
                                    <label class="form-label" for="email">E-mail</label>
                                    <input class="form-control" id="email" type="email" name="email"
                                           aria-describedby="email" <?= !empty($cookie) ? "" : "autofocus" ?>
                                           tabindex="1" value="<?= ($cookie ?? null); ?>"/>
                                </div>
                                <div class="mb-1">
                                    <div class="d-flex justify-content-between">
                                        <label class="form-label" for="password">Senha</label><a
                                                href="<?= url("/recover"); ?>"><small>Esqueceu sua
                                                senha?</small></a>
                                    </div>
                                    <div class="input-group input-group-merge form-password-toggle">
                                        <input class="form-control form-control-merge" id="password" type="password"
                                               name="password" aria-describedby="login-password" tabindex="2"
                                            <?= !empty($cookie) ? "autofocus" : "" ?> /><span
                                                class="input-group-text cursor-pointer"><i
                                                    data-feather="eye"></i></span>
                                    </div>
                                </div>
                                <div class="mb-1">
                                    <div class="form-check">
                                        <input class="form-check-input" id="remember-me" type="checkbox"
                                               tabindex="3" <?= (!empty($cookie) ? "checked" : ""); ?> name="save"/>
                                        <label class="form-check-label" for="remember-me"> Lembrar de mim?</label>
                                    </div>
                                </div>
                                <button class="btn btn-primary w-100" tabindex="4">Acessar</button>
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