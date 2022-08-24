<?php $v->layout("_theme"); ?>

<div class="content-header-left col-md-9 col-12 mb-2">
    <div class="row breadcrumbs-top">
        <div class="col-12">
            <h2 class="content-header-title float-start mb-0" style="margin-right: 15px;">Evolução Postural</h2>
            <div class="breadcrumb-wrapper">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?= url("/"); ?>">Home</a>
                    </li>
                    <li class="breadcrumb-item active">Evolução Postural
                    </li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-body">

        <div class="row">

            <div class="col-12">
                <label class="form-label" for="period">Período</label>
                <select id="period" name="period" class="select2 form-select">
                  <?php foreach ($posture_analysis as $a) : ?>
                      <option value="<?= $a->date_posture_analysis ?>"><?= $a->date_posture_analysis ?></option>
                  <?php endforeach; ?>
                </select>
            </div>

            <button onclick="evaluation()" class="btn btn-success mt-4">Filtrar</button>

        </div>
    </div>
</div>

<div id="evaluationContent">


</div>


<?php $v->start("scripts"); ?>

    <script>
        function evaluation() {
            var periodSelect = document.getElementById('period');
            var periodResult = periodSelect.options[periodSelect.selectedIndex].value;

            var load = $(".ajax_load");
            load.fadeIn(200).css("display", "flex");
            $.ajax({
                url: "/listEvaluation",
                type: "POST",
                data: {
                    period: periodResult
                },
                success: function (obj) {
                    document.getElementById("evaluationContent").innerHTML = "";
                    $('#evaluationContent').html(obj);
                }
            }).done(function () {
                load.fadeOut();
            });

        }
    </script>

<?php $v->end(); ?>