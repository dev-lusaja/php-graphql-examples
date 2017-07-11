<?php
/**
 * Created by PhpStorm.
 * User: dev-lusaja
 * Date: 04/07/17
 * Time: 02:41 PM
 */

namespace MyApp\Controllers;


class priceController
{
    public function getPrices($id = false)
    {
        $prices = [
            'A' => [
                'id' => "A",
                'amount' => 100.00,
                'currency' => "S/",
            ],
            'B' => [
                'id' => "B",
                'amount' => 200.00,
                'currency' => "$",
            ]
        ];

        return $prices[$id];

    }
}