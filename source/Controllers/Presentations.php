<?php

namespace Source\Controllers;

use Source\Core\Controller;
use Source\Models\Presentation;

class Presentations extends Controller
{
    public function __construct()
    {
        parent::__construct(__DIR__ . "/../../themes/" . CONF_VIEW_APP . "/");
    }

    public function video1(?array $data)
    {
        $presentation = (new Presentation())->find("user_id = :a", "a={$data["user_id"]}")->fetch();

        if ($presentation->video1 == "Assistido") {
            redirect("/video2/{$data["user_id"]}");
        }

        $head = $this->seo->render(
            CONF_SITE_NAME . " - " . CONF_SITE_TITLE,
            CONF_SITE_DESC,
            url(),
            theme("/assets/images/share.jpg")
        );

        echo $this->view->render("views/video1", [
            "head" => $head,
            "user_id" => $data["user_id"]
        ]);
    }

    public function video2(?array $data)
    {
        $presentation = (new Presentation())->find("user_id = :a", "a={$data["user_id"]}")->fetch();

        $head = $this->seo->render(
            CONF_SITE_NAME . " - " . CONF_SITE_TITLE,
            CONF_SITE_DESC,
            url(),
            theme("/assets/images/share.jpg")
        );

        echo $this->view->render("views/video2", [
            "head" => $head,
            "user_id" => $data["user_id"]
        ]);
    }

    public function updateVideo1(?array $data)
    {
        $presentationUpdate = (new Presentation())->find("user_id = :a", "a={$data["user_id"]}")->fetch();
        $presentationUpdate->video1 = "Assistido";

        $presentationUpdate->save();

        return json_decode("Salvo com sucesso!");
    }

    public function updateVideo2(?array $data)
    {
        $presentationUpdate = (new Presentation())->find("user_id = :a", "a={$data["user_id"]}")->fetch();
        $presentationUpdate->video2 = "Assistido";

        $presentationUpdate->save();

        return json_decode("Salvo com sucesso!");
    }
}