<?php

namespace Source\Controllers;

use Source\Models\Partnership;

class Partnerships extends App
{
    public function __construct()
    {
        parent::__construct();
    }

    public function partnerships(?array $data)
    {
        $partnerships = (new Partnership())->find()->fetch(true);

        $head = $this->seo->render(
            CONF_SITE_NAME . " - " . CONF_SITE_TITLE,
            CONF_SITE_DESC,
            url(),
            theme("/assets/images/share.jpg")
        );

        echo $this->view->render("views/partnerships", [
            "head" => $head,
            "partnerships" => $partnerships
        ]);
    }
}
