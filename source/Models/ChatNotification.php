<?php

namespace Source\Models;

use Source\Core\Model;

class ChatNotification extends Model
{
  public function __construct()
  {
    parent::__construct("chat_notifications", ["id"], ["sent_by", "received"]);
  }
}