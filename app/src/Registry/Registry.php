<?php
namespace MyApp\Registry;

use MyApp\Types\OutPuts\packageOutputType;
use MyApp\Types\OutPuts\priceOutputType;
use MyApp\Types\InPuts\priceInputType;
use MyApp\Types\InPuts\packageInputType;
use MyApp\Types\queryType;
use MyApp\Types\mutationType;

class Registry
{
    private static $queryType;
    private static $packageOutputType;
    private static $priceOutputType;
    private static $mutation;
    private static $packageInputType;
    private static $priceInputType;

    public static function queryType(): queryType
    {
        return static::$queryType?:(static::$queryType = new queryType());
    }

    public static function mutationType(): mutationType
    {
        return static::$mutation?:(static::$mutation = new mutationType());
    }

    public static function packageOutputType(): packageOutputType
    {
        return static::$packageOutputType?:(static::$packageOutputType = new packageOutputType());
    }

    public static function priceOutputType(): priceOutputType
    {
        return static::$priceOutputType?:(static::$priceOutputType = new priceOutputType());
    }

    public static function packageInputType(): packageInputType
    {
        return static::$packageInputType?:(static::$packageInputType = new packageInputType());
    }

    public static function priceInputType(): priceInputType
    {
        return static::$priceInputType?:(static::$priceInputType = new priceInputType());
    }
}