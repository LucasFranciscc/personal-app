<?php

namespace Source\Models;

use Source\Core\Model;

class Request extends Model
{
    public function __construct()
    {
        parent::__construct("requests", ["id"], ["status", "user_id", "training_sheet_id"]);
    }
}