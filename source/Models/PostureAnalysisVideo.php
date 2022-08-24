<?php

namespace Source\Models;

use Source\Core\Model;

class PostureAnalysisVideo extends Model
{
    public function __construct()
    {
        parent::__construct("posture_analysis_video", ["id"], ["name"]);
    }
}
