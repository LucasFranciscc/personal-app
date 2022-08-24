<?php

namespace Source\Controllers;

use Source\Core\Connect;
use Source\Core\Controller;
use Source\Models\Auth;
use Source\Models\PosturalAnalysis;
use Source\Models\PosturalAnalysisImages;

class PosturalEvaluation extends App
{

  public function __construct()
  {
    parent::__construct();
  }

  public function posturalEvaluation()
  {
    $user = Auth::user();

    $posturalAnalysis = (new PosturalAnalysis())->find("user_id = :a", "a={$user->id}")->order("date_posture_analysis desc")->fetch(true);
    $head = $this->seo->render(
      CONF_SITE_NAME . " - " . CONF_SITE_TITLE,
      CONF_SITE_DESC,
      url(),
      theme("/assets/images/share.jpg")
    );

    echo $this->view->render("views/posturalEvaluation", [
      "head" => $head,
      "posture_analysis" => $posturalAnalysis
    ]);
  }

  public function list(?array $data): void
  {
    $user = Auth::user();

    $evaluetions = (new PosturalAnalysis())->find("user_id = :a and date_posture_analysis = :b ", "a={$user->id}&b={$data["period"]}")->order("date_posture_analysis desc")->fetch();

    $result = (new PosturalAnalysisImages())->find("postural_analysis_id = :a", "a={$evaluetions->id}")->fetch(true);

    $posturalAnalysisPeriod = (new PosturalAnalysis())->find("date_posture_analysis = :a and user_id = :b", "a={$data["period"]}&b={$user->id}")->fetch();

    $reportOptionsPeriod = Connect::getInstance()->query("
      SELECT DISTINCT types_of_postural_analyzes_id FROM posture_analysis_reports_new WHERE postural_analysis_id = {$posturalAnalysisPeriod->id}
    ")->fetchAll();

    $head = $this->seo->render(
      CONF_SITE_NAME . " - " . CONF_SITE_TITLE,
      CONF_SITE_DESC,
      url(),
      theme("/assets/images/share.jpg")
    );

    echo $this->view->render("views/_evaluation", [
      "head" => $head,
      "evaluationsResult" => $result,
      "report" => $reportOptionsPeriod,
      "evaluation_id" => $posturalAnalysisPeriod->id
    ]);
  }
}