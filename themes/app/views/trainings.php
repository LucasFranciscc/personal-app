<?php

use Source\Models\MuscleGroups;
use Source\Models\TrainingExercise;
use Source\Models\MuscleGroupTraining;

$v->layout("_theme"); ?>

<div class="content-header-left col-md-9 col-12 mb-2">
    <div class="row breadcrumbs-top">
        <div class="col-12">
            <h2 class="content-header-title float-start mb-0" style="margin-right: 15px;">Treinos</h2>
            <div class="breadcrumb-wrapper">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?= url("/"); ?>">Home</a>
                    </li>
                    <li class="breadcrumb-item"><a href="<?= url("/training-sheets"); ?>">Ficha de treinos</a>
                    </li>
                    <li class="breadcrumb-item active">Treinos
                    </li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-body">

        <div class="row gy-2">

            <?php foreach($trainings as $training): ?>

            <?php $exercise = (new TrainingExercise)->find("training_id = :training_id", "training_id={$training->id}")->order("position asc")->fetch() ?>

            <?php if(!empty($exercise)): ?>
            <a href="<?= url("/training-exercises/{$training_sheet_id}/{$training->id}/1"); ?>">
                <div class="col-12">
                    <div class="bg-light-secondary position-relative rounwarningded p-2">
                        <h6 class="d-flex align-items-center fw-bolder">
                            <span class="me-50"><?= $training->name_training ?> </span>
                        </h6>
                        <?php $muscleGrpupsTrainings = (new MuscleGroupTraining)->find("training_id = :training_id", "training_id={$training->id}")->fetch(true); ?>
                        <span>Grupos Musculares:
                            <?php foreach($muscleGrpupsTrainings as $data): ?>
                            <?php $muscleGroups = (new MuscleGroups)->findById($data->muscle_group_id);  ?>

                            <?= $muscleGroups->muscle_group ?>,
                            <?php endforeach; ?>
                        </span>

                        <br />

                        <a class="btn btn-outline-danger mt-3" href="<?= url("/generatepdf/{$training->id}"); ?>" <i class="fas fa-file-pdf"></i> Baixar Treino </a>

                    </div>
                </div>
            </a>
            <?php else: ?>

            <?php endif; ?>

            <?php endforeach; ?>

        </div>
    </div>
</div>