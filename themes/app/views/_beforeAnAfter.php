<style>
    div.box {
        width: 150px;
        display: inline-block;
    }
</style>

<div class="card">
    <div class="card-body">

        <div class="row">

            <div class="col-6">
                <label class="form-label" for="before">Antes</label>
                <br/>
                <a class="btn btn-success" data-bs-toggle="modal" data-bs-target="#relatorio1">Relatório</a>

            </div>

            <div class="col-6">
                <label class="form-label" for="after">Depois</label>
                <br/>
                <a class="btn btn-success" data-bs-toggle="modal" data-bs-target="#relatorio2">Relatório</a>

            </div>

        </div>

    </div>
</div>

<div class="card">
    <div class="card-body">

        <div class="row">

            <div class="col-6">
                <img src="<?= urlExterna("/storage/{$before1->image}") ?>" width="250px" height="540px"/>
                <span> Antes </span>
            </div>
            <div class="col-6">
                <img src="<?= urlExterna("/storage/{$after1->image}") ?>" width="250px" height="540px"/>
                <span> Depois </span>
            </div>

        </div>

    </div>
</div>

<div class="card">
    <div class="card-body">

        <div class="row">

            <div class="col-6">
                <img src="<?= urlExterna("/storage/{$before2->image}") ?>" width="250px" height="540px"/>
                <span> Antes </span>
            </div>
            <div class="col-6">
                <img src="<?= urlExterna("/storage/{$after2->image}") ?>" width="250px" height="540px"/>
                <span> Depois </span>
            </div>

        </div>

    </div>
</div>

<div class="card">
    <div class="card-body">

        <div class="row">

            <div class="col-6">
                <img src="<?= urlExterna("/storage/{$before3->image}") ?>" width="250px" height="540px"/>
                <span> Antes </span>
            </div>
            <div class="col-6">
                <img src="<?= urlExterna("/storage/{$after3->image}") ?>" width="250px" height="540px"/>
                <span> Depois </span>
            </div>

        </div>

    </div>
</div>

<div class="card">
    <div class="card-body">

        <div class="row">

            <div class="col-6">
                <img src="<?= urlExterna("/storage/{$before4->image}") ?>" width="250px" height="540px"/>
                <span> Antes </span>
            </div>
            <div class="col-6">
                <img src="<?= urlExterna("/storage/{$after4->image}") ?>" width="250px" height="540px"/>
                <span> Depois </span>
            </div>

        </div>

    </div>
</div>

<div class="card">
    <div class="card-body">

        <div class="row">

            <div class="col-6">
                <img src="<?= urlExterna("/storage/{$before5->image}") ?>" width="250px" height="540px"/>
                <span> Antes </span>
            </div>
            <div class="col-6">
                <img src="<?= urlExterna("/storage/{$after5->image}") ?>" width="250px" height="540px"/>
                <span> Depois </span>
            </div>

        </div>

    </div>
</div>

<div class="card">
    <div class="card-body">

        <div class="row">

            <div class="col-6">
                <img src="<?= urlExterna("/storage/{$before6->image}") ?>" width="250px" height="540px"/>
                <span> Antes </span>
            </div>
            <div class="col-6">
                <img src="<?= urlExterna("/storage/{$after6->image}") ?>" width="250px" height="540px"/>
                <span> Depois </span>
            </div>

        </div>

    </div>
</div>

<div class="card">
    <div class="card-body">

        <div class="row">

            <div class="col-6">
                <img src="<?= urlExterna("/storage/{$before7->image}") ?>" width="250px" height="540px"/>
                <span> Antes </span>
            </div>
            <div class="col-6">
                <img src="<?= urlExterna("/storage/{$after7->image}") ?>" width="250px" height="540px"/>
                <span> Depois </span>
            </div>

        </div>

    </div>
</div>

<div class="card">
    <div class="card-body">

        <div class="row">

            <div class="col-6">
                <img src="<?= urlExterna("/storage/{$before8->image}") ?>" width="250px" height="540px"/>
                <span> Antes </span>
            </div>
            <div class="col-6">
                <img src="<?= urlExterna("/storage/{$after8->image}") ?>" width="250px" height="540px"/>
                <span> Depois </span>
            </div>

        </div>

    </div>
</div>

<div class="card">
    <div class="card-body">

        <div class="row">

            <div class="col-6">
                <img src="<?= urlExterna("/storage/{$before9->image}") ?>" width="250px" height="540px"/>
                <span> Antes </span>
            </div>
            <div class="col-6">
                <img src="<?= urlExterna("/storage/{$after9->image}") ?>" width="250px" height="540px"/>
                <span> Depois </span>
            </div>

        </div>

    </div>
</div>







<div class="modal fade" id="relatorio1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle1"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle1">Antes</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>


            <div class="modal-body">

                <div class="row">

                    <div class="card-body">
                        <div class="col-12">

                          <?php foreach ($report1 as $a): ?>
                              <div class="mb-2">
                                  <strong><?= $a->types_of_postural_analyzes_id ?></strong>
                                  <table class="table table-striped">
                                      <tbody>

                                      <?php $posturaçRes = \Source\Core\Connect::getInstance()->query("
                                      SELECT * FROM posture_analysis_reports_new WHERE types_of_postural_analyzes_id = '{$a->types_of_postural_analyzes_id}' and postural_analysis_id = {$postural_id_before}
                                      ")->fetchAll() ?>

                                      <?php foreach ($posturaçRes as $b): ?>

                                        <?php $video = (new \Source\Models\PostureAnalysisVideo())->findById($b->option_id) ?>
                                          <tr>
                                              <td><?= $b->option_type ?></td>
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


<div class="modal fade" id="relatorio2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle1"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle1">Depois</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">

                <div class="row">

                    <div class="card-body">
                        <div class="col-12">

                          <?php foreach ($report2 as $c): ?>
                              <div class="mb-2">
                                  <strong><?= $c->types_of_postural_analyzes_id ?></strong>
                                  <table class="table table-striped">
                                      <tbody>

                                      <?php $posturaçRes2 = \Source\Core\Connect::getInstance()->query("
                                      SELECT * FROM posture_analysis_reports_new WHERE types_of_postural_analyzes_id = '{$c->types_of_postural_analyzes_id}' and postural_analysis_id = {$postural_id_after}
                                      ")->fetchAll() ?>

                                      <?php foreach ($posturaçRes2 as $d): ?>

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

    // new BeforeAfter({
    //     id: '#evolucao1'
    // });
    // new BeforeAfter({
    //     id: '#evolucao2'
    // });
    // new BeforeAfter({
    //     id: '#evolucao3'
    // });
    // new BeforeAfter({
    //     id: '#evolucao4'
    // });
    // new BeforeAfter({
    //     id: '#evolucao5'
    // });
    // new BeforeAfter({
    //     id: '#evolucao6'
    // });
    // new BeforeAfter({
    //     id: '#evolucao7'
    // });
    // new BeforeAfter({
    //     id: '#evolucao8'
    // });
    // new BeforeAfter({
    //     id: '#evolucao9'
    // });
    // // new BeforeAfter({
    // //     id: '#evolucao10'
    // // });

    $('#video').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var video = button.data('video');
        //
        // var modal = $(this);
        // modal.find('#video').val(video)

        document.getElementById("videoRes").src = "" + video + "";
    });

</script>
