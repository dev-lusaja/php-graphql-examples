<?php
namespace MyApp\Types;

use GraphQL\Type\Definition\ObjectType;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use MyApp\Controllers\packageController;
use MyApp\Registry\Registry;

class mutationType extends ObjectType
{
    public function __construct()
    {
        $type = [
            'name' => 'mutationType',
            'fields' => function() {
                return [
                    'add' => [
                        'description' => 'add new package',
                        'type' => Registry::packageType(),
                        'args' => [
                            'package' => Registry::packageInputType(),
                        ],
                        'resolve' => function($value, $args, packageController  $context, ResolveInfo $info){
                            return $context->addPackage($args['package']);
                        }
                    ],
                    'remove' => [
                        'description' => 'remove a package',
                        'type' => Type::string(),
                        'args' => [
                            'package' => Type::id(),
                        ],
                    ],
                    'update' => [
                        'description' => 'update a package',
                        'type' => Type::string(),
                        'args' => [
                            'package' => Registry::packageType(),
                        ],
                    ],
                ];
            },
        ];
        parent::__construct($type);
    }
}