<?php
namespace MyApp\Types\InPuts;

use GraphQL\Type\Definition\InputObjectType;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;

class priceInputType extends InputObjectType
{
    public function __construct()
    {
        $type = [
            'name' => 'priceInputType',
            'fields' => function() {
                return [
                    'amount' => [
                        'type' => Type::float(),
                        'description' => 'amount',
                    ],
                    'currency' => [
                        'type' => Type::string(),
                        'description' => 'currency symbol',
                    ],
                ];
            },
        ];
        parent::__construct($type);
    }
}