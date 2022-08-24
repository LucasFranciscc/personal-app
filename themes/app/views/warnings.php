<?php $v->layout("_theme"); ?>

<div class="content-header-left col-md-9 col-12 mb-2">
    <div class="row breadcrumbs-top">
        <div class="col-12">
            <h2 class="content-header-title float-start mb-0" style="margin-right: 15px;">Avisos</h2>
            <div class="breadcrumb-wrapper">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?= url("/"); ?>">Home</a>
                    </li>
                    <li class="breadcrumb-item active">Avisos
                    </li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-body">

        <div class="row gy-2">

            <?php foreach($warnings as $warning): ?>
            <div class="col-12">
                <div class="bg-light-secondary position-relative rounded p-2">
                    <h6 class="d-flex align-items-center fw-bolder">
                        <span class="me-50"><?= $warning->warning ?> </span>
                    </h6>
                    <span>Publicado em: <?= date_fmt($warning->created_at); ?></span>

                </div>
            </div>

            <?php endforeach; ?>

        </div>
    </div>
</div>