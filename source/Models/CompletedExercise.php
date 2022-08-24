<?php

namespace Source\Models;

use Source\Core\Model;

class CompletedExercise extends Model
{
    public function __construct()
    {
        parent::__construct("completed_exercises", ["id"], ["training_exercise_id", "training_id", "training_sheet_id", "user_id", "date_of_the_conclusion"]);
    }
}
