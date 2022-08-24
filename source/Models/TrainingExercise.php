<?php

namespace Source\Models;

use Source\Core\Model;

class TrainingExercise extends Model
{
    public function __construct()
    {
        parent::__construct("training_exercises", ["id"], ["training_id", "exercise_id"]);
    }

    public function exercise()
    {
        $exerciseId = $this->exercise_id;

        return (new Exercise())->findById($exerciseId);
    }
}