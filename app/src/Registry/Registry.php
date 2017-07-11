<?php
/**
 * Created by PhpStorm.
 * User: dev-lusaja
 * Date: 07/07/17
 * Time: 04:07 PM
 */

namespace MyApp\Registry;

use MyApp\Types\packageType;
use MyApp\Types\priceType;
use MyApp\Types\queryType;

class Registry
{
    private static $queryType;
    private static $packageType;
    private static $priceType;

    public static function queryType()
    {
        return static::$queryType?:(static::$queryType = new queryType());
    }

    public static function packageType()
    {
        return static::$packageType?:(static::$packageType = new packageType());
    }

    public static function priceType()
    {
        return static::$priceType?:(static::$priceType = new priceType());
    }
}