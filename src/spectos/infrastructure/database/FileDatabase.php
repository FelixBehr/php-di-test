<?php

namespace Spectos\Infrastructure\Database;

use Spectos\Infrastructure\Entities\Model;

class FileDatabase implements Database{

    public function __construct($filePath)
    {
        $this->filePath = $filePath;
        if(file_exists($filePath) === false){
            touch($filePath);
        }
    }

    public function saveEntity($modelName, $modelArray)
    {
        $database = json_decode(file_get_contents($this->filePath), true);
        $modelName = strtolower($modelName);
        if(array_key_exists($modelName, $database) === false){
            $database[$modelName] = [];
        }
        $id = $this->createGUID();
        $database[$modelName][$id] = $modelArray;
        file_put_contents($this->filePath, json_encode($database));
        return $id;
    }

    private function createGUID(){
        return sprintf('%04X%04X-%04X-%04X-%04X-%04X%04X%04X', mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(16384, 20479), mt_rand(32768, 49151), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535));
    }

    public function getEntityByID($modelName, $id)
    {
        $database = json_decode(file_get_contents($this->filePath), true);
        $modelName = strtolower($modelName);
        if(array_key_exists($modelName, $database) === false){
            return [];
        }
        if(array_key_exists($id, $database[$modelName]) === false){
            return [];
        }
        return $database[$modelName][$id];
    }
}