<?php

namespace Spectos\Feedbacks\Models;

use Spectos\Infrastructure\Entities\Model;

class Answer implements Model{

    private $question;
    private $answer;

    public function __construct($question, $answer, $type)
    {
        $this->type = $type;
        $this->question = $question;
        $this->answer = $answer;
    }

    public function getEntityAsAssociativeArray()
    {
        return [
            'question' => $this->question,
            'answer' => $this->answer,
            'type' => $this->type
        ];
    }

    public function createFromAssociativeArray()
    {
        // TODO: Implement createFromAssociativeArray() method.
    }
}