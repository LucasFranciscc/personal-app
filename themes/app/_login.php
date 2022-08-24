<!DOCTYPE html>

<html class="loading dark-layout" lang="pt-br" data-layout="dark-layout" data-textdirection="ltr">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0,minimal-ui">
    <meta name="keywords" content="admin template, Vuexy admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="PIXINVENT">
    <?= $head ?>
    <link rel="apple-touch-icon" href="../../../app-assets/images/ico/apple-icon-120.html">
    <link rel="shortcut icon" type="image/x-icon" href="https://pixinvent.com/demo/vuexy-html-bootstrap-admin-template/app-assets/images/ico/favicon.ico">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600" rel="stylesheet">


    <link rel="stylesheet" href="<?= url("/shared/styles/boot.css"); ?>" />
    <link rel="stylesheet" href="<?= url("/shared/styles/styles.css"); ?>" />


    <link rel="stylesheet" type="text/css" href="<?= url("/shared/app-assets/vendors/css/vendors.min.css"); ?>">
    <link rel="stylesheet" type="text/css" href="<?= url("/shared/app-assets/css/bootstrap.min.css"); ?>">
    <link rel="stylesheet" type="text/css" href="<?= url("/shared/app-assets/css/bootstrap-extended.min.css"); ?>">
    <link rel="stylesheet" type="text/css" href="<?= url("/shared/app-assets/css/colors.min.css"); ?>">
    <link rel="stylesheet" type="text/css" href="<?= url("/shared/app-assets/css/components.min.css"); ?>">
    <link rel="stylesheet" type="text/css" href="<?= url("/shared/app-assets/css/themes/dark-layout.min.css"); ?>">
    <link rel="stylesheet" type="text/css" href="<?= url("/shared/app-assets/css/themes/bordered-layout.min.css"); ?>">
    <link rel="stylesheet" type="text/css" href="<?= url("/shared/app-assets/css/themes/semi-dark-layout.min.css"); ?>">

    <link rel="stylesheet" type="text/css" href="<?= url("/shared/app-assets/css/core/menu/menu-types/vertical-menu.min.css"); ?>">
    <link rel="stylesheet" type="text/css" href="<?= url("/shared/app-assets/css/plugins/forms/form-validation.css"); ?>">
    <link rel="stylesheet" type="text/css" href="<?= url("/shared/app-assets/css/pages/authentication.css"); ?>">
    <link rel="stylesheet" type="text/css" href="<?= url("/shared/assets/css/style.css"); ?>">

    <link rel="stylesheet" type="text/css" href="<?= theme("/assets/css/style.css", CONF_VIEW_APP); ?>">

</head>

<body class="vertical-layout vertical-menu-modern blank-page navbar-floating footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="blank-page">

    <div class="ajax_load">
        <div class="ajax_load_box">
            <div class="ajax_load_box_circle"></div>
            <p class="ajax_load_box_title">Aguarde, carregando...</p>
        </div>
    </div>

    <div class="ajax_response"><?= flash(); ?></div>

    <?= $v->section("content"); ?>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>

    <!-- <script src="<?= url("/shared/scripts/jquery.min.js"); ?>"></script> -->
    <script src="<?= url("/shared/scripts/jquery.form.js"); ?>"></script>
    <script src="<?= url("/shared/scripts/jquery-ui.js"); ?>"></script>
    <script src="<?= url("/shared/scripts/jquery.mask.js"); ?>"></script>
    <script src="<?= url("/shared/scripts/tinymce/tinymce.min.js"); ?>"></script>
    <script src="<?= theme("/assets/js/scripts.js", CONF_VIEW_APP); ?>"></script>

    <!-- <script src="<?= url("/shared/app-assets/vendors/js/vendors.min.js"); ?>"></script> -->
    <!-- <script src="<?= url("/shared/app-assets/vendors/js/forms/validation/jquery.validate.min.js"); ?>"></script> -->
    <!-- <script src="<?= url("/shared/app-assets/js/core/app-menu.min.js"); ?>"></script> -->
    <!-- <script src="<?= url("/shared/app-assets/js/core/app.min.js"); ?>"></script> -->
    <!-- <script src="<?= url("/shared/app-assets/js/scripts/pages/auth-login.js"); ?>"></script> -->

</body>

</html>