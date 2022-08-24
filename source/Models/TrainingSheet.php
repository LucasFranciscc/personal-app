<?php

namespace Source\Models;

use Source\Core\Model;

class TrainingSheet extends Model
{
    public function __construct()
    {
        parent::__construct("training_sheet", ["id"], ["record_name", "user_id", "start_date", "end_date"]);
    }
}
