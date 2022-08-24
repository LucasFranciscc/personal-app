<?php

namespace Source\Models;

use Source\Core\Model;

class AccessLevel extends Model
{
    public function __construct()
    {
        parent::__construct("access_levels", ["id"], ["level"]);
    }
}
