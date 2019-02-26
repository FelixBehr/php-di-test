<?php

namespace Spectos\Feedbacks\Controllers;

use Spectos\Requests\JSONRequest;
use Spectos\Responses\JSONResponse;

class SaveFeedbackController
{
    private $saveFeedbackUseCase;

    public function __construct(\Spectos\Feedbacks\UseCases\SaveFeedbackUseCase $saveFeedbackUseCase)
    {
        $this->saveFeedbackUseCase = $saveFeedbackUseCase;
    }

    public function post(JSONRequest $request)
    {
        $newID = $this->saveFeedbackUseCase->saveFeedback($request->getBodyAsArray());
        return new JSONResponse([
            'status' => 'saved',
            'id' => $newID
        ]);
    }

}