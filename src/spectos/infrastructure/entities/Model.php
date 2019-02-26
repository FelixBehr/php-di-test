<?php

namespace Spectos\Infrastructure\Entities;

Interface Model{
    public function getEntityAsAssociativeArray();
    public function createFromAssociativeArray();
}