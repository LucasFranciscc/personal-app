<?php

namespace Source\Models;

use Source\Core\Model;

class LoadEvolution extends Model
{
  public function __construct()
  {
    parent::__construct("load_evolution", ["id"], ["week_1", "week_2", "week_3", "week_4", "week_5", "week_6", "week_7", "training_sheet_id"]);
  }
}