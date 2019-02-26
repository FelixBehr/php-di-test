<?php

namespace Spectos\Feedbacks\Controllers;

use Spectos\Requests\JSONRequest;
use Spectos\Responses\JSONResponse;

class SaveFeedbackController
{
    private $saveFeedbacksService;

    public function __construct(\Spectos\Feedbacks\Services\SaveFeedbacksService $saveFeedbacksService)
    {
        $this->saveFeedbacksService = $saveFeedbacksService;
    }

    public function post(JSONRequest $request)
    {
        $newID = $this->saveFeedbacksService->saveFeedback($request->getBodyAsArray());
        return new JSONResponse([
            'status' => 'saved',
            'id' => $newID
        ]);
    }

}