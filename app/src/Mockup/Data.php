<?php
namespace MyApp\Mockup;


class Data
{

    /**
     *
     */
    public static function init(): void
    {
        $data = [
            'A' => ['id' => 'A',
                    'name' => 'PackageName A',
                    'details' => [
                        'Service 1',
                        'Service 2',
                        'Service 3'
                    ],
                    'price' => [
                        'id' => "A",
                        'amount' => 100.00,
                        'currency' => "S/",
            ]],
            'B' => ['id' => 'B',
                'name' => 'PackageName B',
                'details' => [
                    'Service 4',
                    'Service 5',
                    'Service 6'
                ],
                'price' => [
                    'id' => "B",
                    'amount' => 200.00,
                    'currency' => "$",
                ]],
        ];
        apcu_store('data', $data);
    }
}