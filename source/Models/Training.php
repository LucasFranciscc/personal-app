<?php

namespace Source\Models;

use Source\Core\Model;

class Training extends Model
{
    public function __construct()
    {
        parent::__construct("training", ["id"], ["name_training", "training_sheet_id", "user_id", "status"]);
    }
}