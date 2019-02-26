<?php

namespace Spectos\Feedbacks\Controllers;

use Spectos\Requests\JSONRequest;
use Spectos\Responses\JSONResponse;

class GetFeedbackController
{
    private $getFeedbackService;

    public function __construct(\Spectos\Feedbacks\Services\GetFeedbackService $getFeedbackService)
    {
        $this->getFeedbackService = $getFeedbackService;
    }

    public function get(JSONRequest $request)
    {
        $id = $request->getParam('id');
        $feedback = $this->getFeedbackService->getFeedbackByID($id);
        return new JSONResponse($feedback);
    }

}