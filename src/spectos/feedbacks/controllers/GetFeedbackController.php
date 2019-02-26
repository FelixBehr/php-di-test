<?php

namespace Spectos\Feedbacks\Controllers;

use Spectos\Requests\JSONRequest;
use Spectos\Responses\JSONResponse;

class GetFeedbackController
{
    private $getFeedbackUseCase;

    public function __construct(\Spectos\Feedbacks\UseCases\GetFeedbackUseCase $getFeedbackUseCase)
    {
        $this->getFeedbackUseCase= $getFeedbackUseCase;
    }

    public function get(JSONRequest $request)
    {
        $id = $request->getParam('id');
        $feedback = $this->getFeedbackUseCase->getFeedbackByID($id);
        return new JSONResponse($feedback);
    }

}