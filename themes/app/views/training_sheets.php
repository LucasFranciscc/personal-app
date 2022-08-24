<?php $v->layout("_theme"); ?>

    <div class="content-header-left col-md-9 col-12 mb-2">
        <div class="row breadcrumbs-top">
            <div class="col-12">
                <h2 class="content-header-title float-start mb-0" style="margin-right: 15px;">Ficha de treinos</h2>
                <div class="breadcrumb-wrapper">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= url("/"); ?>">Home</a>
                        </li>
                        <li class="breadcrumb-item active">Ficha de Treinos
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-body">

            <div class="row gy-2">

              <?php
              $user = \Source\Models\Auth::user();
              ?>

              <?php foreach ($trainingSheets as $trainingSheet): ?>

                <?php if ($trainingSheet->end_date < date("Y-m-d")): ?>
                      <div class="col-12">
                          <div class="bg-light-secondary position-relative rounwarningded p-2">
                              <h6 class="d-flex align-items-center fw-bolder">
                                  <span class="me-50"><?= $trainingSheet->record_name ?> </span>
                              </h6>
                            <?php $request = (new \Source\Models\Request())
                              ->find("user_id = :a AND training_sheet_id = :b", "a={$user->id}&b={$trainingSheet->id}")->order("id desc")->fetch();
                            ?>

                            <?php if (empty($request) || $request->status != "Solicitado"): ?>

                              <?php if (!empty($request) && $request->status == "Rejeitado"): ?>
                                    <span>Solicitação Rejeitada: <?= $request->description ?></span>
                              <?php else: ?>
                                    <a data-post="<?= url("/request") ?>"
                                       data-training_sheet_id="<?= $trainingSheet->id ?>"
                                       data-user_id="<?= $user->id ?>" class="btn btn-primary">Renovar Ficha</a>
                              <?php endif; ?>

                            <?php elseif ($request->status == "Solicitado"): ?>

                                <span>Renovação solicitada, o professor irá aprovar sua solicitação</span>

                            <?php endif; ?>

                          </div>

                      </div>
                <?php else: ?>
                      <a href="<?= url("/trainings/{$trainingSheet->id}"); ?>">
                          <div class="col-12">
                              <div class="bg-light-secondary position-relative rounwarningded p-2">
                                  <h6 class="d-flex align-items-center fw-bolder">
                                      <span class="me-50"><?= $trainingSheet->record_name ?> </span>
                                  </h6>
                                  <span>Expira em: <?= date_fmt($trainingSheet->end_date, "d/m/Y"); ?></span>
                                  <br/>

                                <?php $evolution = (new \Source\Models\LoadEvolution())->find("training_sheet_id = :a", "a={$trainingSheet->id}")->fetch(); ?>

                                <?php if ($evolution != null): ?>
                                    <a class="btn btn-success"
                                       data-bs-toggle="modal" data-bs-target="#evolucao"
                                       data-bs-week_1="<?= $evolution->week_1 ?>"
                                       data-bs-week_2="<?= $evolution->week_2 ?>"
                                       data-bs-week_3="<?= $evolution->week_3 ?>"
                                       data-bs-week_4="<?= $evolution->week_4 ?>"
                                       data-bs-week_5="<?= $evolution->week_5 ?>"
                                       data-bs-week_6="<?= $evolution->week_6 ?>"
                                       data-bs-week_7="<?= $evolution->week_7 ?>"
                                    ><i class="fas fa-signal"></i> Cargas</a>


                                <?php endif; ?>

                                <?php if ($trainingSheet->observation != null): ?>
                                    <a class="btn btn-dark"
                                       data-bs-toggle="modal" data-bs-target="#observation"
                                       data-bs-observation="<?= $trainingSheet->observation ?>">
                                        <i class="fas fa-search"></i> Observação
                                    </a>
                                <?php endif; ?>

                              </div>

                          </div>
                      </a>
                <?php endif; ?>

              <?php endforeach; ?>

            </div>
        </div>
    </div>

    <div class="modal fade" id="evolucao" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle1"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle1">Cargas</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>


                <div class="modal-body">

                    <div class="row">

                        <div class="card-body">
                            <div class="col-12">

                                <div class="mb-2">
                                    <table class="table table-striped">
                                        <tbody id="table_week">


                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>

                    </div>

                </div>

            </div>
        </div>
    </div>

    <div class="modal fade" id="observation" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle1"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle1">Observação</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">

                    <div class="row">

                        <div class="card-body">
                            <div class="col-12">

                                <div class="mb-1">
                                    <textarea style="color: #FFFFFF" class="form-control"
                                              name="observation" id="observation" rows="5"
                                              disabled></textarea>
                                </div>

                            </div>
                        </div>

                    </div>

                </div>

            </div>
        </div>
    </div>

<?php $v->start("scripts"); ?>

    <script>
        $('#observation').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var observation = button.data('bsObservation');

            console.log(button.data())

            var modal = $(this);
            modal.find('#observation').val(observation);
        });


        $('#evolucao').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var week_1 = button.data('bsWeek_1');
            var week_2 = button.data('bsWeek_2');
            var week_3 = button.data('bsWeek_3');
            var week_4 = button.data('bsWeek_4');
            var week_5 = button.data('bsWeek_5');
            var week_6 = button.data('bsWeek_6');
            var week_7 = button.data('bsWeek_7');

            var week1 = "";
            var week2 = "";
            var week3 = "";
            var week4 = "";
            var week5 = "";
            var week6 = "";
            var week7 = "";

            if (week_1 === "Leve") {
                week1 = '<td style="background-color: #00ff0e"> <p style="color: #000000; font-size: initial; font-weight: bold"> ' + week_1 + '</p></td>'
            } else if (week_1 === "Moderado") {
                week1 = '<td style="background-color: #ffd600"> <p style="color: #000000; font-size: initial; font-weight: bold"> ' + week_1 + '</p></td>'
            } else if (week_1 === "Pesado") {
                week1 = '<td style="background-color: #ff7500"> <p style="color: #000000; font-size: initial; font-weight: bold"> ' + week_1 + '</p></td>'
            } else {
                week1 = '<td style="background-color: #ff0000"> <p style="color: #000000; font-size: initial; font-weight: bold"> ' + week_1 + '</p></td>'
            }

            if (week_2 === "Leve") {
                week2 = '<td style="background-color: #00ff0e"> <p style="color: #000000; font-size: initial; font-weight: bold"> ' + week_2 + '</p></td>'
            } else if (week_2 === "Moderado") {
                week2 = '<td style="background-color: #ffd600"> <p style="color: #000000; font-size: initial; font-weight: bold"> ' + week_2 + '</p></td>'
            } else if (week_2 === "Pesado") {
                week2 = '<td style="background-color: #ff7500"> <p style="color: #000000; font-size: initial; font-weight: bold"> ' + week_2 + '</p></td>'
            } else {
                week2 = '<td style="background-color: #ff0000"> <p style="color: #000000; font-size: initial; font-weight: bold"> ' + week_2 + '</p></td>'
            }

            if (week_3 === "Leve") {
                week3 = '<td style="background-color: #00ff0e"> <p style="color: #000000; font-size: initial; font-weight: bold"> ' + week_3 + '</p></td>'
            } else if (week_3 === "Moderado") {
                week3 = '<td style="background-color: #ffd600"> <p style="color: #000000; font-size: initial; font-weight: bold"> ' + week_3 + '</p></td>'
            } else if (week_3 === "Pesado") {
                week3 = '<td style="background-color: #ff7500"> <p style="color: #000000; font-size: initial; font-weight: bold"> ' + week_3 + '</p></td>'
            } else {
                week3 = '<td style="background-color: #ff0000"> <p style="color: #000000; font-size: initial; font-weight: bold"> ' + week_3 + '</p></td>'
            }

            if (week_4 === "Leve") {
                week4 = '<td style="background-color: #00ff0e"> <p style="color: #000000; font-size: initial; font-weight: bold"> ' + week_4 + '</p></td>'
            } else if (week_4 === "Moderado") {
                week4 = '<td style="background-color: #ffd600"> <p style="color: #000000; font-size: initial; font-weight: bold"> ' + week_4 + '</p></td>'
            } else if (week_4 === "Pesado") {
                week4 = '<td style="background-color: #ff7500"> <p style="color: #000000; font-size: initial; font-weight: bold"> ' + week_4 + '</p></td>'
            } else {
                week4 = '<td style="background-color: #ff0000"> <p style="color: #000000; font-size: initial; font-weight: bold"> ' + week_4 + '</p></td>'
            }

            if (week_5 === "Leve") {
                week5 = '<td style="background-color: #00ff0e"> <p style="color: #000000; font-size: initial; font-weight: bold"> ' + week_5 + '</p></td>'
            } else if (week_5 === "Moderado") {
                week5 = '<td style="background-color: #ffd600"> <p style="color: #000000; font-size: initial; font-weight: bold"> ' + week_5 + '</p></td>'
            } else if (week_5 === "Pesado") {
                week5 = '<td style="background-color: #ff7500"> <p style="color: #000000; font-size: initial; font-weight: bold"> ' + week_5 + '</p></td>'
            } else {
                week5 = '<td style="background-color: #ff0000"> <p style="color: #000000; font-size: initial; font-weight: bold"> ' + week_5 + '</p></td>'
            }

            if (week_6 === "Leve") {
                week6 = '<td style="background-color: #00ff0e"> <p style="color: #000000; font-size: initial; font-weight: bold"> ' + week_6 + '</p></td>'
            } else if (week_6 === "Moderado") {
                week6 = '<td style="background-color: #ffd600"> <p style="color: #000000; font-size: initial; font-weight: bold"> ' + week_6 + '</p></td>'
            } else if (week_6 === "Pesado") {
                week6 = '<td style="background-color: #ff7500"> <p style="color: #000000; font-size: initial; font-weight: bold"> ' + week_6 + '</p></td>'
            } else {
                week6 = '<td style="background-color: #ff0000"> <p style="color: #000000; font-size: initial; font-weight: bold"> ' + week_6 + '</p></td>'
            }

            if (week_7 === "Leve") {
                week7 = '<td style="background-color: #00ff0e"> <p style="color: #000000; font-size: initial; font-weight: bold"> ' + week_7 + '</p></td>'
            } else if (week_7 === "Moderado") {
                week7 = '<td style="background-color: #ffd600"> <p style="color: #000000; font-size: initial; font-weight: bold"> ' + week_7 + '</p></td>'
            } else if (week_7 === "Pesado") {
                week7 = '<td style="background-color: #ff7500"> <p style="color: #000000; font-size: initial; font-weight: bold"> ' + week_7 + '</p></td>'
            } else {
                week7 = '<td style="background-color: #ff0000"> <p style="color: #000000; font-size: initial; font-weight: bold"> ' + week_7 + '</p></td>'
            }

            $('#table_week').html('' +
                '<tr>' +
                '<td id="week_1">Semana 1</td>' +
                week1 +
                '</tr>' +

                '<tr>' +
                '<td id="week_1">Semana 2</td>' +
                week2 +
                '</tr>' +

                '<tr>' +
                '<td id="week_1">Semana 3</td>' +
                week3 +
                '</tr>' +

                '<tr>' +
                '<td id="week_1">Semana 4</td>' +
                week4 +
                '</tr>' +

                '<tr>' +
                '<td id="week_1">Semana 5</td>' +
                week5 +
                '</tr>' +

                '<tr>' +
                '<td id="week_1">Semana 6</td>' +
                week6 +
                '</tr>' +

                '<tr>' +
                '<td id="week_1">Semana 7</td>' +
                week7 +
                '</tr>' +
                '')

        });


    </script>

<?php $v->end(); ?>