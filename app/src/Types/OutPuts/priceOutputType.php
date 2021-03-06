<?php
namespace MyApp\Types\OutPuts;

use GraphQL\Type\Definition\ObjectType;
use GraphQL\Type\Definition\Type;

class priceOutputType extends ObjectType
{
    public function __construct()
    {
        $type = [
            'name' => 'priceType',
            'fields' => function() {
                return [
                    'id' => [
                        'type' => Type::id(),
                        'description' => 'id for price',
                    ],
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