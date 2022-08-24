<?php

namespace Source\Models;

use Source\Core\Model;

class Warning extends Model
{
    public function __construct()
    {
        parent::__construct("warnings", ["id"], ["warning", "user_id"]);
    }

    public function user()
    {
        $user = (new User())->findById($this->user_id);

        return $user;
    }
}
