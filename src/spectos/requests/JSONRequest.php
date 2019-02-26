<?php
/**
 * Created by IntelliJ IDEA.
 * User: felixbehr
 * Date: 26.02.19
 * Time: 11:32
 */

namespace Spectos\Requests;


class JSONRequest
{
    private $body;
    private $params;

    public function __construct($params, $body = null)
    {
        $this->params = $params;
        $this->body = $body;
    }

    public function getParam($name){
        return $this->params[$name];
    }

    public function getBodyRaw(){
        return $this->body;
    }
    public function getBodyAsArray(){
        return json_decode($this->body, true);
    }
}