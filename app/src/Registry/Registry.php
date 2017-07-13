<?php
namespace MyApp\Registry;

use MyApp\Types\OutPuts\packageType;
use MyApp\Types\OutPuts\priceType;
use MyApp\Types\InPuts\priceInputType;
use MyApp\Types\InPuts\packageInputType;
use MyApp\Types\queryType;
use MyApp\Types\mutationType;

class Registry
{
    private static $queryType;
    private static $packageType;
    private static $priceType;
    private static $mutation;
    private static $packageInputType;
    private static $priceInputType;

    public static function queryType()
    {
        return static::$queryType?:(static::$queryType = new queryType());
    }

    public static function mutationType()
    {
        return static::$mutation?:(static::$mutation = new mutationType());
    }

    public static function packageType()
    {
        return static::$packageType?:(static::$packageType = new packageType());
    }

    public static function priceType()
    {
        return static::$priceType?:(static::$priceType = new priceType());
    }

    public static function packageInputType()
    {
        return static::$packageInputType?:(static::$packageInputType = new packageInputType());
    }

    public static function priceInputType()
    {
        return static::$priceInputType?:(static::$priceInputType = new priceInputType());
    }
}