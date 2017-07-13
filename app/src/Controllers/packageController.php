<?php

namespace MyApp\Controllers;

use MyApp\Mockup\Data;

class packageController
{
    public function __construct()
    {
    }

    public function getPackageById($id = 0)
    {
        $data = apcu_fetch('data');
        return $data[$id];
    }

    public function getAllPackages()
    {
        return apcu_fetch('data');
    }

    public function addPackage($package)
    {
        $data = apcu_fetch('data');
        $date = new \DateTime();
        $key = $date->getTimestamp() . 'X';
        $newPackage[$key] = $package;
        $newPackage[$key] = $package;
        $newPackage[$key]['id'] = $key;
        $newPackage[$key]['price']['id'] = $key;
        $data = array_merge($data, $newPackage);
        apcu_store('data', $data);
        return $this->getPackageById($key);
    }

}