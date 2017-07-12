<?php

namespace MyApp\Schemas;

use MyApp\Registry\Registry;
use GraphQL\Schema;

class packageSchema extends Schema
{
    public function __construct()
    {
        parent::__construct([
            'query' => Registry::queryType(),
            'mutation' => Registry::mutationType(),
        ]);
    }
}