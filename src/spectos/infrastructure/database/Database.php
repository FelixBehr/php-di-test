<?php

namespace Spectos\Infrastructure\Database;

use Spectos\Infrastructure\Entities\Model;

interface Database{
    public function saveEntity($modelName, $entityAsArray);
    public function getEntityByID($entityName, $id);
}