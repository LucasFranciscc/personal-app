<?php

use Source\Models\Auth;

$user = Auth::user();

$posturalAnalysis = (new \Source\Models\PosturalAnalysis())->find("user_id = :a", "a={$user->id}")->fetch(true);

?>

<!DOCTYPE html>

<html class="loading dark-layout" lang="pt-br" data-layout="dark-layout" data-textdirection="ltr">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0,minimal-ui">
    <meta name="keywords"
          content="admin template, Vuexy admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="PIXINVENT">
  <?= $head ?>
    <link rel="apple-touch-icon" href="../../../app-assets/images/ico/apple-icon-120.html">
    <link rel="shortcut icon" type="image/x-icon"
          href="https://pixinvent.com/demo/vuexy-html-bootstrap-admin-template/app-assets/images/ico/favicon.ico">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600"
          rel="stylesheet">

    <link href="<?= url("/shared/fontawesome/css/all.css"); ?>" rel="stylesheet">
    <link href="<?= url("/shared/fontawesome/css/brands.css"); ?>" rel="stylesheet">
    <link href="<?= url("/shared/fontawesome/css/solid.css"); ?>" rel="stylesheet">

    <script defer src="<?= url("/shared/fontawesome/js/brands.js"); ?>"></script>
    <script defer src="<?= url("/shared/fontawesome/js/solid.js"); ?>"></script>
    <script defer src="<?= url("/shared/fontawesome/js/fontawesome.js"); ?>"></script>

    <link rel="stylesheet" href="<?= url("/shared/styles/boot.css"); ?>"/>
    <link rel="stylesheet" href="<?= url("/shared/styles/styles.css"); ?>"/>

    <link rel="stylesheet" type="text/css" href="<?= url("/shared/app-assets/vendors/css/vendors.min.css"); ?>">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

    <!--    <link rel="stylesheet" type="text/css" href="-->
  <? //= url("/shared/app-assets/css/bootstrap.min.css"); ?><!--">-->
    <link rel="stylesheet" type="text/css" href="<?= url("/shared/app-assets/css/bootstrap-extended.min.css"); ?>">
    <link rel="stylesheet" type="text/css" href="<?= url("/shared/app-assets/css/colors.min.css"); ?>">
    <link rel="stylesheet" type="text/css" href="<?= url("/shared/app-assets/css/components.min.css"); ?>">
    <link rel="stylesheet" type="text/css" href="<?= url("/shared/app-assets/css/themes/dark-layout.min.css"); ?>">
    <link rel="stylesheet" type="text/css" href="<?= url("/shared/app-assets/css/themes/bordered-layout.min.css"); ?>">
    <link rel="stylesheet" type="text/css" href="<?= url("/shared/app-assets/css/themes/semi-dark-layout.min.css"); ?>">

    <link rel="stylesheet" type="text/css"
          href="<?= url("/shared/app-assets/css/core/menu/menu-types/vertical-menu.min.css"); ?>">

    <link rel="stylesheet" type="text/css" href="<?= url("/shared/assets/css/style.css"); ?>">
    <link rel="stylesheet" type="text/css" href="<?= url("/shared/styles/jlplayer.css"); ?>">

    <link rel="stylesheet" type="text/css" href="<?= theme("/assets/css/style.css", CONF_VIEW_APP); ?>">
    <link rel="stylesheet" type="text/css" href="<?= theme("/assets/css/jquery.dataTables.min.css", CONF_VIEW_APP); ?>">

    <link rel="stylesheet" type="text/css"
          href="<?= url("/shared/app-assets/css/core/menu/menu-types/vertical-menu.min.css"); ?>">
    <link rel="stylesheet" type="text/css" href="<?= url("/shared/app-assets/css/pages/app-chat.min.css"); ?>">
    <link rel="stylesheet" type="text/css" href="<?= url("/shared/app-assets/css/pages/app-chat-list.min.css"); ?>">

    <!-- <link rel="stylesheet" type="text/css" href="<?= url("/shared/app-assets/vendors/css/tables/datatable/dataTables.bootstrap5.min.css"); ?>">
    <link rel="stylesheet" type="text/css" href="<?= url("/shared/app-assets/vendors/css/tables/datatable/responsive.bootstrap5.min.css"); ?>">
    <link rel="stylesheet" type="text/css" href="<?= url("/shared/app-assets/vendors/css/tables/datatable/buttons.bootstrap5.min.css"); ?>">
    <link rel="stylesheet" type="text/css" href="<?= url("/shared/app-assets/vendors/css/tables/datatable/rowGroup.bootstrap5.min.css"); ?>">
    <link rel="stylesheet" type="text/css" href="<?= url("/shared/app-assets/vendors/css/pickers/flatpickr/flatpickr.min.css"); ?>">

    <link rel="stylesheet" type="text/css" href="<?= url("/shared/assets/css/style.css"); ?>"> -->

<!--    <link rel="stylesheet" type="text/css" href="--><?//= url("/shared/assets/css/beforeAfter.css") ?><!--">-->

    <link rel="stylesheet" type="text/css" href="<?= url("/shared/app-assets/css/core/menu/menu-types/vertical-menu.min.css") ?>">
    <link rel="stylesheet" type="text/css" href="<?= url("/shared/app-assets/css/plugins/forms/form-quill-editor.min.css"); ?>">

<!--    <script src="https://cdn.ckeditor.com/ckeditor5/34.2.0/classic/ckeditor.js"></script>-->

<!--    <script src="//cdn.ckeditor.com/4.19.0/full/ckeditor.js"></script>-->

    <!--    <script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>-->
<!--    <script type="text/javascript">-->
<!--        window.onload = () => {-->
<!--            CKEDITOR.replace("editor1");-->
<!--            CKEDITOR.config.toolbar = [-->
<!--                ["Bold","Italic"]-->
<!--            ];-->
<!--        };-->
<!---->
<!---->
<!---->
<!--    </script>-->


    <style>
        .imagem-padrao {
            max-width: 700px;
            max-height: 700px;
            width: auto;
            height: auto;
        }
    </style>

    <style>
        table.dataTable tbody tr {
            background-color: #283046;
        }
    </style>

</head>

<body class="vertical-layout vertical-menu-modern  navbar-floating footer-static  " data-open="click"
      data-menu="vertical-menu-modern" data-col="">

<div class="ajax_load" style="z-index: 99999999999999999">
    <div class="ajax_load_box">
        <div class="ajax_load_box_circle"></div>
        <p class="ajax_load_box_title">Aguarde, carregando...</p>
    </div>
</div>

<div class="ajax_response"><?= flash(); ?></div>

<?php if (Auth::user()->name == "Nome"): ?>
    <div class="demo-spacing-0 mb-3">
        <div class="alert alert-primary" role="alert">
            <div class="alert-body"><strong>Preencha os seus dados! <a href="<?= url("/edit_profile"); ?>">Clique aqui</a></strong></div>
        </div>
    </div>
<?php endif; ?>

<nav class="header-navbar navbar navbar-expand-lg align-items-center floating-nav navbar-dark navbar-shadow container-xxl"
     style="z-index: 9;">
    <div class="navbar-container d-flex content">
        <div class="bookmark-wrapper d-flex align-items-center">
            <ul class="nav navbar-nav d-xl-none">
                <li class="nav-item"><a class="nav-link menu-toggle" href="#"><i class="ficon" data-feather="menu"></i></a>
                </li>
            </ul>


        </div>
        <ul class="nav navbar-nav align-items-center ms-auto">

            <!-- <li class="nav-item d-none d-lg-block"><a class="nav-link nav-link-style"><i class="ficon"
                        data-feather="sun"></i></a>
            </li> -->


          <?php $user = Auth::user(); ?>

            <li class="nav-item dropdown dropdown-notification me-25">
                <a class="nav-link" href="#" data-bs-toggle="dropdown" >
                    <i class="ficon" data-feather="bell">

                    </i>
                    <div id="alertMessage" style="display: none">
                        <span class="badge rounded-pill bg-danger badge-up"></span>
                    </div>
                </a>

                <ul class="dropdown-menu dropdown-menu-media dropdown-menu-end">

                    <li class="scrollable-container media-list">
                        <div id="messages">

                        </div>


                    </li>

                </ul>
            </li>

            <li class="nav-item dropdown dropdown-user"><a class="nav-link dropdown-toggle dropdown-user-link"
                                                           id="dropdown-user" href="#" data-bs-toggle="dropdown"
                                                           aria-haspopup="true" aria-expanded="false">
                    <div class="user-nav d-sm-flex d-none"><span class="user-name fw-bolder"><?= $user->name ?> </span>
                    </div>
                    <span class="avatar">
                            <img class="round" src="<?= urlExterna("/storage/$user->photo"); ?>" alt="avatar"
                                 height="40" width="40"><span class="avatar-status-online"></span></span>
                </a>
                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdown-user">
                    <a class="dropdown-item" href="<?= url("edit_profile") ?>">
                        <i class="me-50" data-feather="user"></i>
                        Perfil
                    </a>

                    <a class="dropdown-item" href="<?= url("/logout"); ?>">
                        <i class="me-50" data-feather="power"></i>
                        Sair
                    </a>
                </div>
            </li>
        </ul>
    </div>
</nav>

<ul class="main-search-list-defaultlist d-none">
    <li class="d-flex align-items-center"><a href="#">
            <h6 class="section-label mt-75 mb-0">Files</h6>
        </a></li>
    <li class="auto-suggestion"><a class="d-flex align-items-center justify-content-between w-100"
                                   href="app-file-manager.html">
            <div class="d-flex">
                <div class="me-75"><img src="<?= url("/shared/app-assets/images/icons/xls.png"); ?>" alt="png"
                                        height="32"></div>
                <div class="search-data">
                    <p class="search-data-title mb-0">Two new item submitted</p><small class="text-muted">Marketing
                        Manager</small>
                </div>
            </div>
            <small class="search-data-size me-50 text-muted">&apos;17kb</small>
        </a></li>
    <li class="auto-suggestion"><a class="d-flex align-items-center justify-content-between w-100"
                                   href="app-file-manager.html">
            <div class="d-flex">
                <div class="me-75"><img src="<?= url("/shared/app-assets/images/icons/jpg.png"); ?>" alt="png"
                                        height="32"></div>
                <div class="search-data">
                    <p class="search-data-title mb-0">52 JPG file Generated</p><small class="text-muted">FontEnd
                        Developer</small>
                </div>
            </div>
            <small class="search-data-size me-50 text-muted">&apos;11kb</small>
        </a></li>
    <li class="auto-suggestion"><a class="d-flex align-items-center justify-content-between w-100"
                                   href="app-file-manager.html">
            <div class="d-flex">
                <div class="me-75"><img src="<?= url("/shared/app-assets/images/icons/pdf.png"); ?>" alt="png"
                                        height="32"></div>
                <div class="search-data">
                    <p class="search-data-title mb-0">25 PDF File Uploaded</p><small class="text-muted">Digital
                        Marketing Manager</small>
                </div>
            </div>
            <small class="search-data-size me-50 text-muted">&apos;150kb</small>
        </a></li>
    <li class="auto-suggestion"><a class="d-flex align-items-center justify-content-between w-100"
                                   href="app-file-manager.html">
            <div class="d-flex">
                <div class="me-75"><img src="<?= url("/shared/app-assets/images/icons/doc.png"); ?>" alt="png"
                                        height="32"></div>
                <div class="search-data">
                    <p class="search-data-title mb-0">Anna_Strong.doc</p><small class="text-muted">Web
                        Designer</small>
                </div>
            </div>
            <small class="search-data-size me-50 text-muted">&apos;256kb</small>
        </a></li>
    <li class="d-flex align-items-center"><a href="#">
            <h6 class="section-label mt-75 mb-0">Members</h6>
        </a></li>
    <li class="auto-suggestion"><a class="d-flex align-items-center justify-content-between py-50 w-100"
                                   href="app-user-view-account.html">
            <div class="d-flex align-items-center">
                <div class="avatar me-75"><img
                            src="<?= url("/shared/app-assets/images/portrait/small/avatar-s-8.jpg"); ?>" alt="png"
                            height="32"></div>
                <div class="search-data">
                    <p class="search-data-title mb-0">John Doe</p><small class="text-muted">UI designer</small>
                </div>
            </div>
        </a></li>
    <li class="auto-suggestion"><a class="d-flex align-items-center justify-content-between py-50 w-100"
                                   href="app-user-view-account.html">
            <div class="d-flex align-items-center">
                <div class="avatar me-75"><img
                            src="<?= url("/shared/app-assets/images/portrait/small/avatar-s-1.jpg"); ?>" alt="png"
                            height="32"></div>
                <div class="search-data">
                    <p class="search-data-title mb-0">Michal Clark</p><small class="text-muted">FontEnd
                        Developer</small>
                </div>
            </div>
        </a></li>
    <li class="auto-suggestion"><a class="d-flex align-items-center justify-content-between py-50 w-100"
                                   href="app-user-view-account.html">
            <div class="d-flex align-items-center">
                <div class="avatar me-75"><img
                            src="<?= url("/shared/app-assets/images/portrait/small/avatar-s-14.jpg"); ?>" alt="png"
                            height="32"></div>
                <div class="search-data">
                    <p class="search-data-title mb-0">Milena Gibson</p><small class="text-muted">Digital Marketing
                        Manager</small>
                </div>
            </div>
        </a></li>
    <li class="auto-suggestion"><a class="d-flex align-items-center justify-content-between py-50 w-100"
                                   href="app-user-view-account.html">
            <div class="d-flex align-items-center">
                <div class="avatar me-75"><img
                            src="<?= url("/shared/app-assets/images/portrait/small/avatar-s-6.jpg"); ?>" alt="png"
                            height="32"></div>
                <div class="search-data">
                    <p class="search-data-title mb-0">Anna Strong</p><small class="text-muted">Web Designer</small>
                </div>
            </div>
        </a></li>
</ul>

<ul class="main-search-list-defaultlist-other-list d-none">
    <li class="auto-suggestion justify-content-between"><a
                class="d-flex align-items-center justify-content-between w-100 py-50">
            <div class="d-flex justify-content-start"><span class="me-75" data-feather="alert-circle"></span><span>No results found.</span>
            </div>
        </a></li>
</ul>

<div class="main-menu menu-fixed menu-dark menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="navbar-header" style="margin-bottom: 30px;">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item me-auto"><a class="navbar-brand" href="<?= url(); ?>"><span class="brand-logo"></span>

                    <img src="<?= url("/shared/img/logo1.png"); ?>" alt="" width="150">

                </a></li>
            <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pe-0" data-bs-toggle="collapse"><i
                            class="d-block d-xl-none text-primary toggle-icon font-medium-4" data-feather="x"></i><i
                            class="d-none d-xl-block collapse-toggle-icon font-medium-4  text-primary"
                            data-feather="disc" data-ticon="disc"></i></a></li>
        </ul>
    </div>
    <div class="shadow-bottom"></div>
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">

            </li>
            <li class=" nav-item"><a class="d-flex align-items-center" href="<?= url("/warnings"); ?>"><i
                            class="fas fa-exclamation-circle"></i>
                    <span class="menu-title text-truncate" data-i18n="Email">Avisos</span></a>
            </li>

            <li class=" nav-item"><a class="d-flex align-items-center" href="<?= url("/training-sheets"); ?>"><i
                            class="fas fa-clipboard"></i>
                    <span class="menu-title text-truncate" data-i18n="Email">Ficha de Treino</span></a>
            </li>

            <li class=" nav-item"><a class="d-flex align-items-center" href="<?= url("/partnerships"); ?>"><i
                            class="fas fa-handshake"></i>
                    <span class="menu-title text-truncate" data-i18n="Email">Parcerias</span></a>
            </li>

          <?php if (Auth::user()->access_level_id == 1) : ?>
              <li class=" nav-item"><a class="d-flex align-items-center" href="<?= url("/students"); ?>"><i
                              class="fas fa-graduation-cap"></i>
                      <span class="menu-title text-truncate" data-i18n="Email">Alunos</span></a>
              </li>
          <?php else : ?>
              <li class=" nav-item"><a class="d-flex align-items-center" href="<?= url("/chat/1") ?>"><i
                              class="fas fa-chalkboard-teacher"></i>
                      <span class="menu-title text-truncate" data-i18n="Email">Falar com professor</span></a>
              </li>
          <?php endif; ?>



          <?php if (count($posturalAnalysis) >= 2): ?>
              <li class=" nav-item"><a class="d-flex align-items-center" href="<?= url("/beforeafter") ?>"><i
                              class="fas fa-chart-line"></i>
                      <span class="menu-title text-truncate" data-i18n="Email">Evolução</span></a>
              </li>
          <?php else: ?>

          <?php endif; ?>

            <li class=" nav-item"><a class="d-flex align-items-center" href="<?= url("/posturalEvaluation") ?>">
                    <i class="fas fa-chart-area"></i>
                    <span class="menu-title text-truncate" data-i18n="Email">Avaliação Postural</span></a>
            </li>

<!--            <li class=" nav-item"><a class="d-flex align-items-center"-->
<!--                                     href="https://api.whatsapp.com/send?phone=5547991711818">-->
<!--                    <i class="fab fa-whatsapp"></i>-->
<!--                    <span class="menu-title text-truncate" data-i18n="Email">Whatsapp Professor</span></a>-->
<!--            </li>-->

        </ul>
    </div>
</div>


<div class="app-content content ">
  <?= $v->section("content"); ?>
</div>


<div class="sidenav-overlay"></div>
<div class="drag-target"></div>


<footer class="footer footer-static footer-light">
    <p class="clearfix mb-0"><span class="float-md-start d-block d-md-inline-block mt-25">DIREITO AUTORAL &copy;
                <?= date('Y') ?>, criado e desenvolvido por <a class="ms-25" href="https://www.keygen.com.br/"
                                                               target="_blank">Keygen Solution</a><span
                    class="d-none d-sm-inline-block">, Todos os direitos
                    reservados</span></span></p>
</footer>
<button style="z-index: 9999999;" class="btn btn-primary btn-icon scroll-top" type="button"><i
            data-feather="arrow-up"></i></button>

<!--<script src="--><? //= url("/shared/scripts/jquery.min.js"); ?><!--"></script>-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<!-- Importando o js do bootstrap -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
        integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
        crossorigin="anonymous"></script>

<script src="<?= url("/shared/app-assets/vendors/js/vendors.min.js"); ?>"></script>

<script src="<?= url("/shared/app-assets/js/core/app-menu.min.js"); ?>"></script>
<script src="<?= url("/shared/app-assets/js/core/app.min.js"); ?>"></script>
<script src="<?= url("/shared/app-assets/js/scripts/customizer.min.js"); ?>"></script>
<script src="<?= url("/shared/scripts/jlplayer.js"); ?>"></script>

<!-- <script src="https://code.jquery.com/jquery-3.5.1.js"></script> -->


<script src="<?= url("/shared/scripts/jquery.form.js"); ?>"></script>
<script src="<?= url("/shared/scripts/jquery-ui.js"); ?>"></script>
<script src="<?= url("/shared/scripts/jquery.mask.js"); ?>"></script>
<script src="<?= url("/shared/scripts/tinymce/tinymce.min.js"); ?>"></script>
<script src="<?= theme("/assets/js/scripts.js", CONF_VIEW_APP); ?>"></script>

<!-- <script src="https://code.jquery.com/jquery-3.5.1.js"></script> -->
<script src="<?= theme("/assets/js/jquery.dataTables.min.js", CONF_VIEW_APP); ?>"></script>

<!-- <script src="<?= url("/shared/app-assets/vendors/js/tables/datatable/jquery.dataTables.min.js"); ?>"></script>
    <script src="<?= url("/shared/app-assets/vendors/js/tables/datatable/dataTables.bootstrap5.min.js"); ?>"></script>
    <script src="<?= url("/shared/app-assets/vendors/js/tables/datatable/dataTables.responsive.min.js"); ?>"></script>
    <script src="<?= url("/shared/app-assets/vendors/js/tables/datatable/responsive.bootstrap5.min.js"); ?>"></script>
    <script src="<?= url("/shared/app-assets/vendors/js/tables/datatable/datatables.checkboxes.min.js"); ?>"></script>
    <script src="<?= url("/shared/app-assets/vendors/js/tables/datatable/datatables.buttons.min.js"); ?>"></script>


    <script src="<?= url("/shared/app-assets/js/scripts/tables/table-datatables-basic.min.js"); ?>"></script> -->

<script src="<?= url("/shared/app-assets/vendors/js/charts/chart.min.js"); ?>"></script>
<script src="<?= url("/shared/app-assets/vendors/js/pickers/flatpickr/flatpickr.min.js"); ?>"></script>
<!-- <script src="<?= url("/shared/app-assets/js/scripts/charts/chart-chartjs.min.js"); ?>"></script> -->



<?= $v->section("scripts"); ?>

<script>
    $(document).ready(function () {
        $('#example').DataTable({
            responsive: true,
            "scrollY": "390px",
            "scrollCollapse": true,
            language: {
                "sEmptyTable": "Nenhum registro encontrado",
                "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
                "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
                "sInfoFiltered": "(Filtrados de _MAX_ registros)",
                "sInfoPostFix": "",
                "sInfoThousands": ".",
                "sLengthMenu": "_MENU_ resultados por página",
                "sLoadingRecords": "Carregando...",
                "sProcessing": "Processando...",
                "sZeroRecords": "Nenhum registro encontrado",
                "sSearch": "Pesquisar",
                "oPaginate": {
                    "sNext": "Próximo",
                    "sPrevious": "Anterior",
                    "sFirst": "Primeiro",
                    "sLast": "Último"
                }
            }
        });
    });

    $(window).on('load', function () {
        if (feather) {
            feather.replace({
                width: 14,
                height: 14
            });
        }
    })
</script>

<script>

    setInterval(function () {
        $('#messages').load('<?= url("/notifications"); ?>');

        $.ajax({
            type: "POST",
            url: "/alert",
            success: function (data) {
                let response = JSON.parse(data);
                if (response.res == null) {
                    document.getElementById("alertMessage").style.display = "none"
                } else {
                    document.getElementById("alertMessage").style.display = "block"
                }
            }
        });
    }, 5000);

</script>

<script src="<?= url("/shared/app-assets/js/scripts/pages/app-chat.min.js"); ?>"></script>

<!--<script src="--><?//= url("/shared/assets/js/beforeAfter.js") ?><!--"></script>-->



<?= $v->section("scripts"); ?>


</body>

</html>