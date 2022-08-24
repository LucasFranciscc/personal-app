<div class="card">
    <div class="card-body">

        <div class="row">

            <div class="col-12">
                <a class="btn btn-success" data-bs-toggle="modal" data-bs-target="#relatorio">Relatório</a>
            </div>

        </div>

    </div>
</div>

<?php foreach ($evaluationsResult as $item): ?>
    <div id="evolucao1" class="bal-container" style="z-index: 999;">
        <div>
            <img src="<?= urlExterna("/storage/{$item->image}") ?>" class="">
        </div>
    </div>
<?php endforeach; ?>

<div class="modal fade" id="relatorio" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle1"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle1">Relatório</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>


            <div class="modal-body">

                <div class="row">

                    <div class="card-body">
                        <div class="col-12">

                          <?php foreach ($report as $a): ?>
                              <div class="mb-2">
                                  <strong><?= $a->types_of_postural_analyzes_id ?></strong>
                                  <table class="table table-striped">
                                      <tbody>

                                      <?php $postural = \Source\Core\Connect::getInstance()->query("
                                      SELECT * FROM posture_analysis_reports_new WHERE types_of_postural_analyzes_id = '{$a->types_of_postural_analyzes_id}' and postural_analysis_id = {$evaluation_id}
                                      ")->fetchAll() ?>

                                      <?php foreach ($postural as $d): ?>

                                        <?php $video = (new \Source\Models\PostureAnalysisVideo())->findById($d->option_id) ?>
                                          <tr>
                                              <td><?= $d->option_type ?></td>
                                              <td><a class="btn btn-outline-success" data-bs-toggle="modal"
                                                     data-bs-target="#video"
                                                     data-video="https://www.youtube.com/embed/<?= $video->video_code ?>">Saber
                                                      Mais</a></td>
                                          </tr>
                                      <?php endforeach; ?>

                                      </tbody>
                                  </table>
                              </div>
                          <?php endforeach; ?>

                        </div>
                    </div>

                </div>

            </div>

        </div>
    </div>
</div>

<div class="modal fade" id="video" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle1"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle1">Vídeo</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">

                <div class="row">

                    <div class="card-body">
                        <div class="col-12">

                            <iframe id="videoRes"
                                    frameborder="0"
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                    allowfullscreen>
                            </iframe>

                        </div>
                    </div>

                </div>

            </div>

        </div>
    </div>
</div>

<script>
    $('#video').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var video = button.data('video');
        //
        // var modal = $(this);
        // modal.find('#video').val(video)

        document.getElementById("videoRes").src = "" + video + "";
    });
</script>