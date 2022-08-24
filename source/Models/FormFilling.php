<?php


namespace Source\Models;


use Source\Core\Model;

class FormFilling extends Model
{
  public function __construct()
  {
    parent::__construct("form_filling", ["id"], ["user_id", "status", "validity"]);
  }
}