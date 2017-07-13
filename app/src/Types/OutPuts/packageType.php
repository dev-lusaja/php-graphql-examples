<?php
namespace MyApp\Types\OutPuts;

use GraphQL\Type\Definition\ObjectType;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use MyApp\Registry\Registry;

class packageType extends ObjectType
{
    public function __construct()
    {

        $type = [
            'name' => 'packageType',
            'fields' => function() {
                return [
                    'id' => [
                        'type' => Type::id(),
                    ],
                    'name' => [
                        'type' => Type::string(),
                    ],
                    'price' => [
                        'type' => Registry::priceType(),
                    ],
                    'details' => [
                        'type' => Type::listOf(Type::string()),
                    ]
                ];
            },
            'resolveField' => function($value, $args, $context, ResolveInfo $info){
                if (isset($value[$info->fieldName])){
                    return $value[$info->fieldName];
                } else {
                    return null;
                }
            }
        ];
        parent::__construct($type);
    }
}