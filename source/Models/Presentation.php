<?php

namespace Source\Models;

use Source\Core\Model;

class Presentation extends Model
{
    public function __construct()
    {
        parent::__construct("presentation", ["id"], ["video1", "video2", "user_id"]);
    }
}