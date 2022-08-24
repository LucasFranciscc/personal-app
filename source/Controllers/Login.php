<?php

namespace Source\Controllers;

use Source\Core\Controller;
use Source\Models\Auth;
use Source\Models\User;

class Login extends Controller
{
  public function __construct()
  {
    parent::__construct(__DIR__ . "/../../themes/" . CONF_VIEW_APP . "/");
  }

  public function login(?array $data): void
  {
    if (!empty($data["action"]) && $data["action"] == "login") {

      // if (request_limit("weblogin", 3, 60 * 5)) {
      //   $json['message'] = $this->message->error("Você já efetuou 3 tentativas, esse é o limite. Por favor, aguarde 5 minutos para tentar novamente!")->render();
      //   echo json_encode($json);
      //   return;
      // }

      if (empty($data['email']) || empty($data['password'])) {
        $json['message'] = $this->message->warning("Informe seu email e senha para entrar")->render();
        echo json_encode($json);
        return;
      }

      $save = (!empty($data['save']) ? true : false);
      $auth = new Auth();
      $login = $auth->login($data['email'], $data['password'], $save);

      if ($login) {
        $user = Auth::user();

        if ($user->access_level_id == 1 || $user->access_level_id == 2 || $user->access_level_id == 3) {
          $this->message->success("Seja bem-vindo(a) de volta " . $user->name . "!")->flash();
          $json['redirect'] = url("/home");
        } else {
          $this->message->error("Você não tem permissão")->flash();
          $json['redirect'] = url("/login");
        }
      } else {
        $json['message'] = $auth->message()->before("Ooops! ")->render();
      }

      echo json_encode($json);
      return;
    }

    $head = $this->seo->render(
      CONF_SITE_NAME . " - Login - " . CONF_SITE_DESC,
      CONF_SITE_DESC,
      url(),
      theme("/assets/images/share.jpg")
    );

    echo $this->view->render("views/login", [
      "head" => $head,
      "cookie" => filter_input(INPUT_COOKIE, "authEmail")
    ]);
  }

  public function recover(?array $data): void
  {
    if (Auth::user()) {
      redirect("/");
    }


    if (!empty($data['csrf'])) {
      //            if (!csrf_verify($data)) {
      //                $json['message'] = $this->message->error("Erro ao enviar, favor use o formulário")->render();
      //                echo json_encode($json);
      //                return;
      //            }

      if (empty($data["email"])) {
        $json['message'] = $this->message->info("Informe seu e-mail para continuar")->render();
        echo json_encode($json);
        return;
      }

      if (request_repeat("webforget", $data["email"])) {
        $json['message'] = $this->message->error("Ooops! Você já tentou este e-mail antes")->render();
        echo json_encode($json);
        return;
      }

      $auth = new Auth();
      if ($auth->forget($data["email"])) {
        $json["message"] = $this->message->success("Acesse seu e-mail para recuperar a senha")->render();
      } else {
        $json["message"] = $auth->message()->before("Ooops! ")->render();
      }

      echo json_encode($json);
      return;
    }

    $head = $this->seo->render(
      CONF_SITE_NAME . " | Recuperar senha",
      CONF_SITE_DESC,
      theme("/assets/images/image.jpg"),
      false
    );

    echo $this->view->render("views/recover", [
      "head" => $head
    ]);
  }

  public function reset(?array $data): void
  {
    if (Auth::user()) {
      redirect("/");
    }

    if (!empty($data['csrf'])) {
      if (!csrf_verify($data)) {
        $json['message'] = $this->message->error("Erro ao enviar, favor use o formulário")->render();
        echo json_encode($json);
        return;
      }

      if (empty($data["password"]) || empty($data["password_re"])) {
        $json["message"] = $this->message->info("Informe e repita a senha para continuar")->render();
        echo json_encode($json);
        return;
      }

      list($email, $code) = explode("|", $data["code"]);
      $auth = new Auth();

      if ($auth->reset($email, $code, $data["password"], $data["password_re"])) {
        $this->message->success("Senha alterada com sucesso")->flash();
        $json["redirect"] = url("/login");
      } else {
        $json["message"] = $auth->message()->before("Ooops! ")->render();
      }

      echo json_encode($json);
      return;
    }

    $head = $this->seo->render(
      CONF_SITE_NAME . " | Recuperar senha",
      CONF_SITE_DESC,
      theme("/assets/images/image.jpg"),
      false
    );

    echo $this->view->render("views/reset", [
      "head" => $head,
      "code" => $data["code"]
    ]);
  }
}
