<?php

namespace Spectos\Feedbacks\Models;

use Spectos\Infrastructure\Entities\Model;

class Feedback implements Model
{

    private $answers = [];

    public function getEntityAsAssociativeArray()
    {
        $answers = [];
        /** @var Answer $answer */
        foreach ($this->answers as $answer) {
            $answers[] = $answer->getEntityAsAssociativeArray();
        }
        return [
            'feedback' => [
                'answers' => $answers
            ]
        ];
    }

    public function createFromAssociativeArray()
    {
        // TODO: Implement createFromAssociativeArray() method.
    }

    public function addAnswer(Answer $answer)
    {
        $this->answers[] = $answer;
    }

    public function getAnswers()
    {

    }

    public function getID()
    {
        // TODO: Implement getID() method.
    }

    public function setID()
    {
        // TODO: Implement setID() method.
    }
}