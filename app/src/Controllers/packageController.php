<?php

namespace MyApp\Controllers;

use MyApp\Controllers\priceController;

class packageController
{
    private $priceController;

    public function __construct()
    {
        $this->priceController = new priceController();
    }

    public function getPackageById($id = 0)
    {
        $package = $this->listOfPackages($id);
        $package['details'] = $this->listOfPackageDetails($id);
        $package['price'] = $this->priceController->getPrices($id);
        return $data['package'] = $package;
    }

    public function getAllPackages()
    {
        $packages = $this->listOfPackages();
        foreach ($packages as $package => $packageData) {
            $packages[$package]['details'] = $this->listOfPackageDetails($package);
            $packages[$package]['price'] = $this->priceController->getPrices($package);
        }
        return $packages;
    }

    public function listOfPackages($id = false)
    {
        $data = [
            'A' => ['id' => 'A', 'name' => 'PackageName A'],
            'B' => ['id' => 'B', 'name' => 'PackageName B']
        ];

        if ($id) {
            return $data[$id];
        } else {
            return $data;
        }
    }

    public function listOfPackageDetails($packageId = false)
    {
        $details = [
          'A' => ['Service 1', 'Service 2', 'Service 3'],
          'B' => ['Service 4', 'Service 5', 'Service 6'],
        ];

        if ($packageId){
            return $details[$packageId];
        } else {
            return $details;
        }
    }

}