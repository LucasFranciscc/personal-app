<?php

namespace Source\Controllers;

use Source\Models\TrainingSheet;

class TrainingSheets extends App
{
    public function __construct()
    {
        parent::__construct();
    }

    public function trainingSheets(): void
    {
      $trainingSheets = (new TrainingSheet)->find("user_id = :user_id AND status = 'active'", "user_id={$this->loggedUser->id}")->fetch(true);

      $head = $this->seo->render(
        CONF_SITE_NAME . " - " . CONF_SITE_TITLE,
        CONF_SITE_DESC,
        url(),
        theme("/assets/images/share.jpg")
      );
  
      echo $this->view->render("views/training_sheets", [
        "head" => $head,
        "trainingSheets" => $trainingSheets
      ]);
    }
    
}