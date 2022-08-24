<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?= $head ?>


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

  <link rel="stylesheet" type="text/css" href="<?= url("/shared/assets/css/beforeAfter.css") ?>">

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
<body>

<div class="ajax_load" style="z-index: 99999999999999999">
  <div class="ajax_load_box">
    <div class="ajax_load_box_circle"></div>
    <p class="ajax_load_box_title">Aguarde, carregando...</p>
  </div>
</div>

<div class="ajax_response"><?= flash(); ?></div>

<div class="card">

  <div class="card-body py-2 my-25">
    <!-- header section -->

    <!--/ header section -->

    <!-- form -->
    <form class="validate-form mt-2 pt-50" action="<?= url("editUser"); ?>">

      <div class="d-flex">
        <a href="#" class="me-25">
          <img src="<?= urlExterna("/storage/$student->photo"); ?>" id="account-upload-img" class="uploadedAvatar rounded me-50" alt="profile image" height="100" width="100" />
        </a>

        <input type="hidden" name="action" value="update">
        <!-- upload and reset button -->
        <div class="d-flex align-items-end mt-75 ms-1">
          <div>
            <label for="photo" class="btn btn-sm btn-primary mb-75 me-75">Enviar foto</label>
            <input type="file" id="photo" name="photo" hidden accept="image/*" required/>
          </div>
        </div>
        <!--/ upload and reset button -->
      </div>

      <div class="row">
        <input type="hidden" name="action" value="update">
        <input type="hidden" name="user_id" value="<?= $student->id ?>">
        <div class="col-12 col-sm-6 mb-1">
          <label class="form-label" for="name">Nome</label>
          <input type="text" class="form-control" id="name" name="name" value="<?= $student->name ?>" required />
        </div>
        <div class="col-12 col-sm-6 mb-1">
          <label class="form-label" for="birth">Data de Nascimento</label>
          <input type="text" class="form-control mask-date" id="birth" name="birth" required value="<?= date_fmt($student->birth, "d/m/Y") ?>" />
        </div>
        <div class=" col-12 col-sm-6 mb-1">
          <label class="form-label" for="phone">Telefone</label>
          <input type="text" class="form-control mask-phone" id="phone" name="phone" required value="<?= $student->phone ?>" />
        </div>
        <div class="col-12 col-sm-6 mb-1">
          <label class="form-label" for="sex">Sexo</label>
          <select id="sex" name="sex" class="select2 form-select" required>
            <option <?= $student->sex == "Masculino" ? "selected" : "" ?> value="Masculino">Masculino</option>
            <option <?= $student->sex == "Feminino" ? "selected" : "" ?> value="Feminino">Feminino</option>
          </select>
        </div>
        <div class="col-12 col-sm-6 mb-1">
          <label class="cpf" for="accountPhoneNumber">CPF</label>
          <input type="text" class="form-control account-number-mask" id="cpf" name="cpf" required value="<?= $student->cpf ?>" />
        </div>
        <div class="col-12 col-sm-6 mb-1">
          <label class="form-label" for="profession">Profissão</label>
          <input type="text" class="form-control" id="profession" name="profession" value="<?= $student->profession ?>" />
        </div>
        <div class="col-12 col-sm-6 mb-1">
          <label class="password" for="accountPhoneNumber">Nova Senha</label>
          <input type="password" class="form-control account-number-mask" id="password" name="password" />
        </div>

        <div class="col-12">
          <button class="btn btn-primary mt-1 me-1">Salvar</button>
        </div>
      </div>
    </form>
    <!--/ form -->
  </div>
</div>


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

<script src="<?= url("/shared/app-assets/js/scripts/pages/app-chat.min.js"); ?>"></script>

<script src="<?= url("/shared/assets/js/beforeAfter.js") ?>"></script>

</body>
</html>