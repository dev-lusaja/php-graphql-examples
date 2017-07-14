<?php
namespace MyApp\Types;

use GraphQL\Type\Definition\ObjectType;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use MyApp\Registry\Registry;
use MyApp\Contexts\packageContext;

class queryType extends ObjectType
{
    public function __construct()
    {
        $type = [
            'name' => 'Query',
            'fields' => function (){
                return [
                    'package' => [
                        'type' => Registry::packageOutputType(),
                        'args' => [
                            'id' => Type::id(),
                        ],
                        'resolve' => function($value, $args, packageContext  $context, ResolveInfo $info){
                            return $context->getPackageById($args['id']);
                        }
                    ],
                    'packages' => [
                        'type' => Type::listOf(Registry::packageOutputType()),
                        'resolve' =>  function($value, $args, packageContext  $context, ResolveInfo $info){
                            $packages = $context->getAllPackages();
                            return $packages;
                        }
                    ],
                ];
            },
        ];
        parent::__construct($type);
    }
}