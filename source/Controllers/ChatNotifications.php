<?php

namespace Source\Controllers;

use Source\Models\Auth;
use Source\Models\ChatNotification;

class ChatNotifications extends App
{
  public function __construct()
  {
    parent::__construct();
  }

  public function notifications()
  {
    $user = Auth::user();

    $notifications = (new ChatNotification())->find("received = :a and visualized = 0", "a={$user->id}")->fetch(true);

    $head = $this->seo->render(
      CONF_SITE_NAME . " | Video 1",
      CONF_SITE_DESC,
      url("/admin"),
      url("/admin/assets/images/image.jpg"),
      false
    );

    echo $this->view->render("views/chat_notifications", [
      "head" => $head,
      "notifications" => $notifications
    ]);
  }

  public function alert()
  {
    $user = Auth::user();

    $notifications = (new ChatNotification())->find("received = :a and visualized = 0", "a={$user->id}")->fetch();

    echo json_encode(["res" => $notifications]);
  }
}