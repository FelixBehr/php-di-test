<?php

namespace Spectos\Feedbacks\Services;

use Spectos\Feedbacks\Models\Answer;
use Spectos\Feedbacks\Models\Feedback;
use Spectos\Infrastructure\Database\Database;

class SaveFeedbacksService
{
    private $database;

    public function __construct(Database $database)
    {
        $this->database = $database;
    }

    public function saveFeedback($rawFeedback)
    {
        $feedback = new Feedback();
        foreach($rawFeedback['feedback']['answers'] as $a){
            $answer = new Answer($a['answer'], $a['question'], $a['type']);
            $feedback->addAnswer($answer);
        }

        $newID = $this->database->saveEntity('Feedback', $feedback->getEntityAsAssociativeArray());
        return $newID;
    }
}