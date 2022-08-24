<?php

namespace Source\Models;

use Source\Core\Model;

class PosturalAnalysis extends Model
{
    public function __construct()
    {
        parent::__construct("postural_analysis", ["id"], ["user_id", "date_posture_analysis"]);
    }
}