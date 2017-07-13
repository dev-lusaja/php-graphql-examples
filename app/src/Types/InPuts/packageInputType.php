<?php
namespace MyApp\Types\InPuts;

use GraphQL\Type\Definition\InputObjectType;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use MyApp\Registry\Registry;

class packageInputType extends InputObjectType
{
    public function __construct()
    {

        $type = [
            'name' => 'packageInputType',
            'fields' => function() {
                return [
                    'name' => [
                        'type' => Type::string(),
                    ],
                    'price' => [
                        'type' => Registry::priceInputType(),
                    ],
                    'details' => [
                        'type' => Type::listOf(Type::string()),
                    ]
                ];
            },
            'resolveField' => function($value, $args, $context, ResolveInfo $info){
                return null;
            }
        ];
        parent::__construct($type);
    }
}