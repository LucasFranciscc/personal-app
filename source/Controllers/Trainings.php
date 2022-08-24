<?php

namespace Source\Controllers;

use Source\Models\Training;

class Trainings extends App
{
    public function __construct()
    {
        parent::__construct();
    }

    public function trainings(?array $data): void
    {
      $trainings = (new Training())->find("user_id = :user_id AND training_sheet_id = :training_sheet_id", "user_id={$this->loggedUser->id}&training_sheet_id={$data["training_sheet_id"]}")->fetch(true);

      $head = $this->seo->render(
        CONF_SITE_NAME . " - " . CONF_SITE_TITLE,
        CONF_SITE_DESC,
        url(),
        theme("/assets/images/share.jpg")
      );
  
      echo $this->view->render("views/trainings", [
        "head" => $head,
        "trainings" => $trainings,
        "training_sheet_id" => $data["training_sheet_id"]
      ]);
    }
}