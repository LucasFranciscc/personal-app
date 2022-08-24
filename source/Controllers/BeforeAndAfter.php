<?php

namespace Source\Controllers;

use Source\Core\Connect;
use Source\Models\Auth;
use Source\Models\PosturalAnalysis;
use Source\Models\PosturalAnalysisImages;

class BeforeAndAfter extends App
{

  public function beforeAfterResult(?array $data): void
  {
    if (Auth::user()->name == "Nome") {
      redirect("/edit_profile");
    }

    $user = Auth::user();

    $before = (new PosturalAnalysis())->find("user_id = :a and date_posture_analysis = :b ", "a={$user->id}&b={$data["before"]}")->order("date_posture_analysis desc")->fetch();
    $after = (new PosturalAnalysis())->find("user_id = :a and date_posture_analysis = :b ", "a={$user->id}&b={$data["after"]}")->order("date_posture_analysis desc")->fetch();

    $before1 = (new PosturalAnalysisImages())->find("postural_analysis_id = :a and position = 1", "a={$before->id}")->fetch();
    $before2 = (new PosturalAnalysisImages())->find("postural_analysis_id = :a and position = 2", "a={$before->id}")->fetch();
    $before3 = (new PosturalAnalysisImages())->find("postural_analysis_id = :a and position = 3", "a={$before->id}")->fetch();
    $before4 = (new PosturalAnalysisImages())->find("postural_analysis_id = :a and position = 4", "a={$before->id}")->fetch();
    $before5 = (new PosturalAnalysisImages())->find("postural_analysis_id = :a and position = 5", "a={$before->id}")->fetch();
    $before6 = (new PosturalAnalysisImages())->find("postural_analysis_id = :a and position = 6", "a={$before->id}")->fetch();
    $before7 = (new PosturalAnalysisImages())->find("postural_analysis_id = :a and position = 7", "a={$before->id}")->fetch();
    $before8 = (new PosturalAnalysisImages())->find("postural_analysis_id = :a and position = 8", "a={$before->id}")->fetch();
    $before9 = (new PosturalAnalysisImages())->find("postural_analysis_id = :a and position = 9", "a={$before->id}")->fetch();
    $before10 = (new PosturalAnalysisImages())->find("postural_analysis_id = :a and position = 10", "a={$before->id}")->fetch();

    $after1 = (new PosturalAnalysisImages())->find("postural_analysis_id = :a and position = 1", "a={$after->id}")->fetch();
    $after2 = (new PosturalAnalysisImages())->find("postural_analysis_id = :a and position = 2", "a={$after->id}")->fetch();
    $after3 = (new PosturalAnalysisImages())->find("postural_analysis_id = :a and position = 3", "a={$after->id}")->fetch();
    $after4 = (new PosturalAnalysisImages())->find("postural_analysis_id = :a and position = 4", "a={$after->id}")->fetch();
    $after5 = (new PosturalAnalysisImages())->find("postural_analysis_id = :a and position = 5", "a={$after->id}")->fetch();
    $after6 = (new PosturalAnalysisImages())->find("postural_analysis_id = :a and position = 6", "a={$after->id}")->fetch();
    $after7 = (new PosturalAnalysisImages())->find("postural_analysis_id = :a and position = 7", "a={$after->id}")->fetch();
    $after8 = (new PosturalAnalysisImages())->find("postural_analysis_id = :a and position = 8", "a={$after->id}")->fetch();
    $after9 = (new PosturalAnalysisImages())->find("postural_analysis_id = :a and position = 9", "a={$after->id}")->fetch();
    $after10 = (new PosturalAnalysisImages())->find("postural_analysis_id = :a and position = 10", "a={$after->id}")->fetch();

    $posturalAnalysisBefore = (new PosturalAnalysis())->find("date_posture_analysis = :a and user_id = :b", "a={$data["before"]}&b={$user->id}")->fetch();
    $posturalAnalysisAfter = (new PosturalAnalysis())->find("date_posture_analysis = :a and user_id = :b", "a={$data["after"]}&b={$user->id}")->fetch();

    $reportOptions1Before = Connect::getInstance()->query("
      SELECT DISTINCT types_of_postural_analyzes_id FROM posture_analysis_reports_new WHERE postural_analysis_id = {$posturalAnalysisBefore->id}
    ")->fetchAll();

    $reportOptions2After = Connect::getInstance()->query("
      SELECT DISTINCT types_of_postural_analyzes_id FROM posture_analysis_reports_new WHERE postural_analysis_id = {$posturalAnalysisAfter->id}
    ")->fetchAll();

    $head = $this->seo->render(
      CONF_SITE_NAME . " - " . CONF_SITE_TITLE,
      CONF_SITE_DESC,
      url(),
      theme("/assets/images/share.jpg")
    );

    echo $this->view->render("views/_beforeAnAfter", [
      "head" => $head,
      "before1" => $before1,
      "before2" => $before2,
      "before3" => $before3,
      "before4" => $before4,
      "before5" => $before5,
      "before6" => $before6,
      "before7" => $before7,
      "before8" => $before8,
      "before9" => $before9,
      "before10" => $before10,
      "after1" => $after1,
      "after2" => $after2,
      "after3" => $after3,
      "after4" => $after4,
      "after5" => $after5,
      "after6" => $after6,
      "after7" => $after7,
      "after8" => $after8,
      "after9" => $after9,
      "after10" => $after10,
      "report1" => $reportOptions1Before,
      "report2" => $reportOptions2After,
      "postural_id_before" => $posturalAnalysisBefore->id,
      "postural_id_after" => $posturalAnalysisAfter->id
    ]);
  }

  public function beforeAfter(?array $data): void
  {
    $user = Auth::user();

    $posturalAnalysis = (new PosturalAnalysis())->find("user_id = :a", "a={$user->id}")->order("date_posture_analysis desc")->fetch(true);

    if (!empty($data)) {


    } else {

      $posturalAnalysisSearch = (new PosturalAnalysis())->find("user_id = :a", "a={$user->id}")->order("date_posture_analysis desc")->limit(2)->fetch(true);

      $before1 = (new PosturalAnalysisImages())->find("postural_analysis_id = :a and position = 1", "a={$posturalAnalysisSearch[0]->id}")->fetch();
      $before2 = (new PosturalAnalysisImages())->find("postural_analysis_id = :a and position = 2", "a={$posturalAnalysisSearch[0]->id}")->fetch();
      $before3 = (new PosturalAnalysisImages())->find("postural_analysis_id = :a and position = 3", "a={$posturalAnalysisSearch[0]->id}")->fetch();
      $before4 = (new PosturalAnalysisImages())->find("postural_analysis_id = :a and position = 4", "a={$posturalAnalysisSearch[0]->id}")->fetch();
      $before5 = (new PosturalAnalysisImages())->find("postural_analysis_id = :a and position = 5", "a={$posturalAnalysisSearch[0]->id}")->fetch();
      $before6 = (new PosturalAnalysisImages())->find("postural_analysis_id = :a and position = 6", "a={$posturalAnalysisSearch[0]->id}")->fetch();
      $before7 = (new PosturalAnalysisImages())->find("postural_analysis_id = :a and position = 7", "a={$posturalAnalysisSearch[0]->id}")->fetch();
      $before8 = (new PosturalAnalysisImages())->find("postural_analysis_id = :a and position = 8", "a={$posturalAnalysisSearch[0]->id}")->fetch();
      $before9 = (new PosturalAnalysisImages())->find("postural_analysis_id = :a and position = 9", "a={$posturalAnalysisSearch[0]->id}")->fetch();
      $before10 = (new PosturalAnalysisImages())->find("postural_analysis_id = :a and position = 10", "a={$posturalAnalysisSearch[0]->id}")->fetch();

      $after1 = (new PosturalAnalysisImages())->find("postural_analysis_id = :a and position = 1", "a={$posturalAnalysisSearch[1]->id}")->fetch();
      $after2 = (new PosturalAnalysisImages())->find("postural_analysis_id = :a and position = 2", "a={$posturalAnalysisSearch[1]->id}")->fetch();
      $after3 = (new PosturalAnalysisImages())->find("postural_analysis_id = :a and position = 3", "a={$posturalAnalysisSearch[1]->id}")->fetch();
      $after4 = (new PosturalAnalysisImages())->find("postural_analysis_id = :a and position = 4", "a={$posturalAnalysisSearch[1]->id}")->fetch();
      $after5 = (new PosturalAnalysisImages())->find("postural_analysis_id = :a and position = 5", "a={$posturalAnalysisSearch[1]->id}")->fetch();
      $after6 = (new PosturalAnalysisImages())->find("postural_analysis_id = :a and position = 6", "a={$posturalAnalysisSearch[1]->id}")->fetch();
      $after7 = (new PosturalAnalysisImages())->find("postural_analysis_id = :a and position = 7", "a={$posturalAnalysisSearch[1]->id}")->fetch();
      $after8 = (new PosturalAnalysisImages())->find("postural_analysis_id = :a and position = 8", "a={$posturalAnalysisSearch[1]->id}")->fetch();
      $after9 = (new PosturalAnalysisImages())->find("postural_analysis_id = :a and position = 9", "a={$posturalAnalysisSearch[1]->id}")->fetch();
      $after10 = (new PosturalAnalysisImages())->find("postural_analysis_id = :a and position = 10", "a={$posturalAnalysisSearch[1]->id}")->fetch();

    }


    $head = $this->seo->render(
      CONF_SITE_NAME . " - " . CONF_SITE_TITLE,
      CONF_SITE_DESC,
      url(),
      theme("/assets/images/share.jpg")
    );

    echo $this->view->render("views/beforeAnAfter", [
      "head" => $head,
      "posture_analysis" => $posturalAnalysis,
      "before1" => $before1,
      "before2" => $before2,
      "before3" => $before3,
      "before4" => $before4,
      "before5" => $before5,
      "before6" => $before6,
      "before7" => $before7,
      "before8" => $before8,
      "before9" => $before9,
      "before10" => $before10,
      "after1" => $after1,
      "after2" => $after2,
      "after3" => $after3,
      "after4" => $after4,
      "after5" => $after5,
      "after6" => $after6,
      "after7" => $after7,
      "after8" => $after8,
      "after9" => $after9,
      "after10" => $after10
    ]);
  }
}