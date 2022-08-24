<?php

namespace Source\Controllers;

use http\Url;
use Source\Core\Connect;
use Source\Core\Controller;
use Source\Models\Auth;
use Source\Models\FormFilling;
use Source\Models\Presentation;
use Source\Models\Status;
use Source\Models\User;
use Source\Models\Warning;

class App extends Controller
{

  /** @var User */
  private $user;

  public $loggedUser;

  public function __construct()
  {

    $this->loggedUser = Auth::user();

    parent::__construct(__DIR__ . "/../../themes/" . CONF_VIEW_APP . "/");

    if (!$this->user = Auth::user()) {
      $this->message->warning("Efetue login para acessar.")->flash();
      redirect("/login");
    }

    $user = Auth::user();

    $presentation = (new Presentation())->find("user_id = :a", "a={$user->id}")->fetch();

    if ($presentation->video1 == "Não assistido") {
      header('Location: ' . url("/video1/{$user->id}"));
      exit();
    } elseif ($presentation->video2 == "Não assistido") {
      header('Location: ' . url("/video2/{$user->id}"));
      exit();
    }

    $status = (new Status())->find("user_id = :user_id", "user_id={$user->id}")->fetch();

    if ($status == null)
    {
      $statusCreate = new Status();
      $statusCreate->user_id = $user->id;
      $statusCreate->status = "processando";
      $statusCreate->save();

      header('Location: ' . urlExterna("/formControl/{$user->id}"));
      return;
    } elseif ($status->status == "processando")
    {
      header('Location: ' . urlExterna("/formControl/{$user->id}"));
      return;
    }

//    $formFilling = (new FormFilling())->find("user_id = :user_id", "user_id={$user->id}")->order("id desc")->fetch();
//
//    $formFillingCount = (new FormFilling())->find("user_id = :user_id", "user_id={$user->id}")->count();
//
//
//    if ($formFillingCount == 1 || $formFilling->status == "preenchido") {
//
//      if ($formFilling->status == "não preenchido") {
//        header('Location: ' . urlExterna("/anamnese/{$user->id}"));
//      } elseif ($formFilling->status == "preenchido" && $formFilling->anamnese_id == null) {
//        header('Location: ' . urlExterna("/anamnese/{$user->id}"));
//      } elseif ($formFilling->status == "preenchido" and date_fmt($formFilling->validity, "Y/m/d") <= date('Y/m/d')) {
//
//        $formFillingNew = new FormFilling();
//        $formFillingNew->user_id = $user->id;
//        $formFillingNew->status = "não preenchido";
//        $formFillingNew->validity = date('Y-m-d', strtotime('+7 week', strtotime(date('Y-m-d'))));
//        $formFillingNew->save();
//
//        header('Location: ' . url("/home"));
//      }
//    } else {
//      header('Location: ' . urlExterna("/avaliacao_postural/{$user->id}"));
//    }


  }


  public function home()
  {
    if (Auth::user()->name == "Nome") {
      redirect("/edit_profile");
    }

    $treeWarnings = (new Warning)->find()->limit(2)->order("id desc")->fetch(true);

    $user = Auth::user();

    //domingo - Sunday
    //segunda - Monday
    //terça - Tuesday
    //quarta - Wednesday
    //quinta - Thursday
    //sexta - Friday
    //sabado - Saturday

    $segunda = Connect::getInstance()->query("
    SELECT DISTINCT(date_of_the_conclusion) FROM `completed_exercises` where DAYNAME(date_of_the_conclusion) = 'Monday' and user_id = {$user->id};
    ")->fetchAll();

    $terca = Connect::getInstance()->query("
    SELECT DISTINCT(date_of_the_conclusion) FROM `completed_exercises` where DAYNAME(date_of_the_conclusion) = 'Tuesday' and user_id = {$user->id};
    ")->fetchAll();

    $quarta = Connect::getInstance()->query("
    SELECT DISTINCT(date_of_the_conclusion) FROM `completed_exercises` where DAYNAME(date_of_the_conclusion) = 'Wednesday' and user_id = {$user->id};
    ")->fetchAll();

    $quinta = Connect::getInstance()->query("
    SELECT DISTINCT(date_of_the_conclusion) FROM `completed_exercises` where DAYNAME(date_of_the_conclusion) = 'Thursday' and user_id = {$user->id};
    ")->fetchAll();

    $sexta = Connect::getInstance()->query("
    SELECT DISTINCT(date_of_the_conclusion) FROM `completed_exercises` where DAYNAME(date_of_the_conclusion) = 'Friday' and user_id = {$user->id};
    ")->fetchAll();

    $sabado = Connect::getInstance()->query("
    SELECT DISTINCT(date_of_the_conclusion) FROM `completed_exercises` where DAYNAME(date_of_the_conclusion) = 'Saturday' and user_id = {$user->id};
    ")->fetchAll();

    $domingo = Connect::getInstance()->query("
    SELECT DISTINCT(date_of_the_conclusion) FROM `completed_exercises` where DAYNAME(date_of_the_conclusion) = 'Sunday' and user_id = {$user->id};
    ")->fetchAll();


    $head = $this->seo->render(
      CONF_SITE_NAME . " - " . CONF_SITE_TITLE,
      CONF_SITE_DESC,
      url(),
      theme("/assets/images/share.jpg")
    );

    echo $this->view->render("views/home", [
      "head" => $head,
      "warnings" => array_reverse($treeWarnings),
      "segunda" => count($segunda),
      "terca" => count($terca),
      "quarta" => count($quarta),
      "quinta" => count($quinta),
      "sexta" => count($sexta),
      "sabado" => count($sabado),
      "domingo" => count($domingo)
    ]);
  }

  public function logout(): void
  {
    $this->message->success("Você saiu com sucesso " . Auth::user()->name . ". Volte logo :)")->flash();

    Auth::logout();
    redirect("/login");
  }


}
