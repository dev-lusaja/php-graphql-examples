<?php
namespace MyApp\Types;

use GraphQL\Type\Definition\ObjectType;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use MyApp\Contexts\packageContext;
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
                        'type' => Registry::packageOutputType(),
                        'args' => [
                            'package' => Registry::packageInputType(),
                        ],
                        'resolve' => function($value, $args, packageContext  $context, ResolveInfo $info){
                            return $context->addPackage($args['package']);
                        }
                    ],
                    'remove' => [
                        'description' => 'remove a package',
                        'type' => Registry::packageOutputType(),
                        'args' => [
                            'id' => Type::id(),
                        ],
                        'resolve' => function($value, $args, packageContext  $context, ResolveInfo $info){
                            return $context->removePackage($args['id']);
                        }
                    ],
                    'update' => [
                        'description' => 'update a package',
                        'type' => Registry::packageOutputType(),
                        'args' => [
                            'package' => Registry::packageInputType(),
                            'id' => Type::id(),
                        ],
                        'resolve' => function($value, $args, packageContext  $context, ResolveInfo $info){
                            return $context->updatePackage($args['id'], $args['package']);
                        }
                    ],
                ];
            },
        ];
        parent::__construct($type);
    }
}