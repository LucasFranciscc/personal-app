<?php


namespace Source\Models;


use Source\Core\Model;

class PosturalAnalysisImages extends Model
{
  public function __construct()
  {
    parent::__construct("postural_analysis_images", ["id"], ["postural_analysis_id", "image"]);
  }
}