<?php

namespace Source\Controllers;

use Source\Models\Warning;

class Warnings extends App
{
    public function __construct()
    {
        parent::__construct();
    }

    public function warnings()
    {
      $Warnings = (new Warning)->find()->limit(15)->order("id desc")->fetch(true);

      $head = $this->seo->render(
        CONF_SITE_NAME . " - " . CONF_SITE_TITLE,
        CONF_SITE_DESC,
        url(),
        theme("/assets/images/share.jpg")
      );
  
      echo $this->view->render("views/warnings", [
        "head" => $head,
        "warnings" => $Warnings
      ]);
    }
}