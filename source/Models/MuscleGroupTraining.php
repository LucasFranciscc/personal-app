<?php 

namespace Source\Models;

use Source\Core\Model;

class MuscleGroupTraining extends Model
{
    public function __construct()
    {
        parent::__construct("muscle_group_training", ["id"], ["training_id", "muscle_group_id"]);
    }
}