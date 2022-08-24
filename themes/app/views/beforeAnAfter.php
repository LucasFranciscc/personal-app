<?php $v->layout("_theme"); ?>

<?php


?>

    <div class="content-header-left col-md-9 col-12 mb-2">
        <div class="row breadcrumbs-top">
            <div class="col-12">
                <h2 class="content-header-title float-start mb-0" style="margin-right: 15px;">Evolução</h2>
                <div class="breadcrumb-wrapper">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= url("/"); ?>">Home</a>
                        </li>
                        <li class="breadcrumb-item active">Evolução
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-body">

            <div class="row">

                <div class="col-6">
                    <label class="form-label" for="before">Antes</label>
                    <select id="before" name="before" class="select2 form-select">
                      <?php foreach ($posture_analysis as $a) : ?>
                          <option value="<?= $a->date_posture_analysis ?>"><?= $a->date_posture_analysis ?></option>
                      <?php endforeach; ?>
                    </select>
                </div>

                <div class="col-6">
                    <label class="form-label" for="after">Depois</label>
                    <select id="after" name="after" class="select2 form-select">
                      <?php foreach ($posture_analysis as $a) : ?>
                          <option value="<?= $a->date_posture_analysis ?>"><?= $a->date_posture_analysis ?></option>
                      <?php endforeach; ?>
                    </select>
                </div>

                <button onclick="BeforeAfterResult()" class="btn btn-success mt-2">Filtrar</button>

            </div>
        </div>
    </div>

    <div class="mainSection" id="beforeAfterResult">


    </div>



<?php $v->start("scripts"); ?>

    <script>
        function BeforeAfterResult() {
            var beforeSelect = document.getElementById('before');
            var beforeResult = beforeSelect.options[beforeSelect.selectedIndex].value;

            var afterSelect = document.getElementById('after');
            var afterResult = afterSelect.options[afterSelect.selectedIndex].value;

            var load = $(".ajax_load");
            load.fadeIn(200).css("display", "flex");
            $.ajax({
                url: "/appPEB/beforeafterResult",
                type: "POST",
                data: {
                    before: beforeResult,
                    after: afterResult
                },
                success: function (obj) {
                    document.getElementById("beforeAfterResult").innerHTML = "";
                    $('#beforeAfterResult').html(obj);
                }
            }).done(function () {
                load.fadeOut();
            });

        }
    </script>

<?php $v->end(); ?>