<?php $v->layout("_theme"); ?>

    <style>
        .cke_top {
            border-bottom: 1px solid #161d31;
            background: #161d31;
            padding: 6px 8px 2px;
            white-space: normal;
        }

        .cke_bottom {
            padding: 6px 8px 2px;
            position: relative;
            border-top: 1px solid #161d31;
            background: #161d31;
        }
    </style>

    <div class="content-header-left col-md-9 col-12 mb-2">
        <div class="row breadcrumbs-top">
            <div class="col-12">
                <h2 class="content-header-title float-start mb-0" style="margin-right: 15px;">Treinos</h2>
                <div class="breadcrumb-wrapper">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= url("/"); ?>">Home</a>
                        </li>
                        <li class="breadcrumb-item"><a href="<?= url("/training-sheets"); ?>">Ficha de Treinos</a>
                        </li>
                        <li class="breadcrumb-item"><a href="<?= url("/trainings/{$training_sheet_id}"); ?>">Treinos</a>
                        </li>
                        <li class="breadcrumb-item active"><?= !empty($exercise) ? $exercise->title : "" ?>
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <section id="card-demo-example">
        <div class="row match-height">
            <div class="col-md-6 col-lg-3"></div>
            <div class="col-md-6 col-lg-6">
                <div class="card">

                    <!-- <video preload="auto" class="jlplayer-video" poster="<?= url("/shared/img/logo1.png"); ?>">
                    <source src="<?= urlExterna("storage/$exercise->video_code") ?>">
                    <track kind="captions" src="legenda.vtt" default>
                </video> -->

                    <iframe src="https://www.youtube.com/embed/<?= $exercise->video_code ?>"
                            title="<?= $exercise->title ?>"
                            frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen>
                    </iframe>

                    <div class="card-body">
                        <h4 class="card-title" style="text-align: center;"><?= $exercise->title ?></h4>

                        <div class="row">

                            <a class="btn btn-dark mb-3"
                               data-bs-toggle="modal" data-bs-target="#anotacoes"
                               data-id="<?= $training_exercise->id ?>"
                               data-note="<?= $training_exercise->notes ?>"
                            ><i class="fas fa-edit"></i> Anotações</a>

                            <div class=" card-app-design">
                                <div class="design-planning-wrapper mb-2 py-75">

                                    <div class="design-planning">
                                        <p class="card-text mb-25">Séries</p>
                                        <h6 class="mb-0"><?= $training_exercise->series ?>X</h6>
                                    </div>

                                    <div class="design-planning">
                                        <p class="card-text mb-25">Repetições</p>
                                        <h6 class="mb-0"><?= $training_exercise->minimal_repetition ?></h6>
                                    </div>

                                    <div class="design-planning">
                                        <p class="card-text mb-25">Descanso</p>
                                        <h6 class="mb-0"><?= $training_exercise->rest ?>s</h6>
                                    </div>

                                  <?php if (!empty($training_exercise->intensification_method)): ?>

                                    <?php
                                    $method = (new \Source\Models\IntensificationMethod())->findById($training_exercise->intensification_method);
                                    ?>

                                      <div class="design-planning">
                                          <p class="card-text mb-25">Método de Intensificação</p>
                                          <h6 class="mb-0"><?= $method->intensification_method ?>

                                              <a
                                                      type="button"
                                                      class="btn btn-sm"
                                                      style="color: #FFFFFF"
                                                      data-bs-toggle="modal" data-bs-target="#method"
                                                      data-method="<?= $method->description ?>"
                                              >
                                                  <svg class="svg-inline--fa fa-exclamation-circle fa-w-16"
                                                       aria-hidden="true" focusable="false" data-prefix="fas"
                                                       data-icon="exclamation-circle" role="img"
                                                       xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                                       data-fa-i2svg="">
                                                      <path fill="currentColor"
                                                            d="M504 256c0 136.997-111.043 248-248 248S8 392.997 8 256C8 119.083 119.043 8 256 8s248 111.083 248 248zm-248 50c-25.405 0-46 20.595-46 46s20.595 46 46 46 46-20.595 46-46-20.595-46-46-46zm-43.673-165.346l7.418 136c.347 6.364 5.609 11.346 11.982 11.346h48.546c6.373 0 11.635-4.982 11.982-11.346l7.418-136c.375-6.874-5.098-12.654-11.982-12.654h-63.383c-6.884 0-12.356 5.78-11.981 12.654z"></path>
                                                  </svg>
                                              </a>

                                          </h6>

                                      </div>
                                  <?php endif; ?>

                                  <?php if ($training_exercise->observation != null): ?>
                                      <div class="design-planning col-12">
                                          <p class="card-text mb-25">Observação</p>
                                          <h6 class="mb-0"><?= $training_exercise->observation ?></h6>
                                      </div>
                                  <?php endif; ?>

                                </div>
                            </div>
                        </div>

                    </div>

                  <?php
                  $position = $training_exercise->position + 1;
                  $positionAnterior = $training_exercise->position - 1;
                  $count = $countExercises;
                  ?>

                    <div>
                      <?php if ($positionAnterior != 0): ?>
                          <a class="btn btn-primary float-start" style="margin-left: 10px; "
                             href="<?= url("/training-exercises/{$training_sheet_id}/{$training_id}/{$positionAnterior}"); ?>">
                              Ver Anterior
                          </a>
                      <?php endif; ?>

                      <?php if ($training_exercise->position < $count): ?>
                          <a class="btn btn-primary float-end" style="margin-right: 10px;"
                             href="<?= url("/training-exercises/{$training_sheet_id}/{$training_id}/{$position}"); ?>">
                              Ver Próximo
                          </a>
                      <?php endif; ?>
                    </div>

                    <br>

                  <?php if ($completedExercise == 0): ?>
                      <a class="btn btn-success w-100"
                         data-post="<?= url("/complete-exercise"); ?>"
                         data-training_exercise_id="<?= $training_exercise->id ?>"
                         data-training_id="<?= $training_id ?>"
                         data-training_sheet_id="<?= $training_sheet_id ?>" data-position="<?= $position ?>">
                          Finalizar Exercício
                      </a>
                  <?php endif; ?>

                </div>
            </div>


        </div>
    </section>

    <div class="modal fade" id="method" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle1"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">

                    <div class="row">

                        <div class="card-body">
                            <div class="col-12">

                                <div class="mb-1">
                                    <textarea style="color: #FFFFFF" class="form-control" id="method" rows="5"
                                              disabled></textarea>
                                </div>

                            </div>
                        </div>

                    </div>

                </div>

            </div>
        </div>
    </div>

    <div class="modal fade" id="anotacoes" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle1"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">

                <div class="modal-header">
                    <h4>Anotações</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">

                    <div class="row">

                        <form action="<?= url("/note"); ?>" method="post">
                            <input type="hidden" id="id" name="id">
                            <div class="card-body">
                                <div class="col-12">

                                    <textarea class="form-control" style="white-space: pre" id="content" name="content" rows="10"></textarea>

                                </div>
                            </div>

                            <button type="submit" class="btn btn-success mt-3">Salvar</button>
                        </form>

                    </div>

                </div>

            </div>
        </div>
    </div>

<?php $v->start("scripts"); ?>
    <script>
        $('#method').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var method = button.data('method');

            var modal = $(this);
            modal.find('#method').val(method)

        });

        $('#anotacoes').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var id = button.data('id');
            var note = button.data('note');

            var modal = $(this);
            modal.find('#id').val(id)
            modal.find('#content').val(note)

        });
    </script>
<?php $v->end(); ?>