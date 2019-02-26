<?php

namespace Spectos\Feedbacks\Services;

use Spectos\Feedbacks\Models\Answer;
use Spectos\Feedbacks\Models\Feedback;
use Spectos\Infrastructure\Database\Database;

class GetFeedbackService
{
    private $database;

    public function __construct(Database $database)
    {
        $this->database = $database;
    }

    public function getFeedbackByID($id)
    {
        return $this->database->getEntityByID('Feedback', $id);
    }
}