<?php

namespace Source\Models;

use Source\Core\Model;

class Partnership extends Model
{
    public function __construct()
    {
        parent::__construct("partnerships", ["id"], ["name", "image", "phone"]);
    }
}
