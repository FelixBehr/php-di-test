<?php
/**
 * Created by IntelliJ IDEA.
 * User: felixbehr
 * Date: 26.02.19
 * Time: 11:38
 */

namespace Spectos\Responses;


class JSONResponse
{

    public function __construct($response)
    {
        $this->response = $response;
    }

    public function getResponseJSON(){
        return json_encode($this->response);
    }
}