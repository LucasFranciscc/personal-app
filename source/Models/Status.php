<?php

namespace Source\Models;

use Source\Core\Model;

class Status extends Model
{
  public function __construct()
  {
    parent::__construct("status", ["id"], ["user_id", "status"]);
  }
}