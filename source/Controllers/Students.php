<?php

namespace Source\Controllers;

use Source\Models\Auth;
use Source\Models\User;
use Source\Support\Thumb;
use Source\Support\Upload;

class Students extends App
{
  public function __construct()
  {
    parent::__construct();
  }

  public function students(?array $data): void
  {

    $students = (new User())->find("access_level_id != 1")->fetch(true);

    $head = $this->seo->render(
      CONF_SITE_NAME . " - " . CONF_SITE_TITLE,
      CONF_SITE_DESC,
      url(),
      theme("/assets/images/share.jpg")
    );

    echo $this->view->render("views/students", [
      "head" => $head,
      "students" => $students
    ]);
  }

  public function edit_profile(): void
  {
    $student = (new User())->findById(Auth::user()->id);

    $head = $this->seo->render(
      CONF_SITE_NAME . " - " . CONF_SITE_TITLE,
      CONF_SITE_DESC,
      url(),
      theme("/assets/images/share.jpg")
    );

    echo $this->view->render("views/edit", [
      "head" => $head,
      "student" => $student
    ]);
  }

  public function editUser(?array $data): void
  {
    $data = filter_var_array($data, FILTER_SANITIZE_STRIPPED);

    if ($data["action"] = "update") {
      $studentUpdate = (new User())->findById($data["user_id"]);

      if (!empty($_FILES["photo"])) {
        if ($studentUpdate->photo && file_exists(__DIR__ . "/../../../public_html/" . CONF_UPLOAD_DIR . "/{$studentUpdate->photo}")) {
          unlink(__DIR__ . "/../../../public_html/" . CONF_UPLOAD_DIR . "/{$studentUpdate->photo}");
          (new Thumb())->flush($studentUpdate->photo);
        }

        $nameFile = strtoupper(substr(bin2hex(random_bytes(7)), 1));
        $dir = __DIR__ . "/../../../public_html/" . CONF_UPLOAD_DIR . "/images/";
        $image = $dir . basename($nameFile);

        move_uploaded_file($_FILES['photo']['tmp_name'], $dir . $nameFile . $_FILES['photo']["name"]);

        $studentUpdate->photo = "images/" . $nameFile . $_FILES['photo']["name"];
      }


      $dataBirt = str_replace("/", "-", $data["birth"]);
      $birth = date('Y-m-d', strtotime($dataBirt));

      $phone = preg_replace("/[^0-9]/", "", $data["phone"]);

      $studentUpdate->name = $data["name"];
      $studentUpdate->birth = $birth;
      $studentUpdate->phone = $phone;
      $studentUpdate->sex = $data["sex"];
      $studentUpdate->cpf = preg_replace("/[^0-9]/", "", $data["cpf"]);
      $studentUpdate->profession = $data["profession"];
      $studentUpdate->password = (!empty($data["password"]) ? $data["password"] : $studentUpdate->password);

      if (!$studentUpdate->save()) {
        $json["message"] = $studentUpdate->message()->render();
        echo json_encode($json);
        return;
      }

      $this->message->success("Atualizado com sucesso!")->flash();
      echo json_encode(["reload" => true]);
      return;
    }
  }


}
