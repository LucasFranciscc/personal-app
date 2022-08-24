<?php


namespace Source\Models;


use Source\Core\Model;

class IntensificationMethod extends Model
{
  public function __construct()
  {
    parent::__construct("intensification_methods", ["id"], ["intensification_method"]);
  }
}