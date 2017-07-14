<?php

namespace MyApp\Contexts;

class packageContext
{

    /**
     * @param string $id
     * @return array
     */
    public function getPackageById(String $id):array
    {
        $data = apcu_fetch('data');
        return $data[$id];
    }

    /**
     * @return array
     */
    public function getAllPackages(): array
    {
        return apcu_fetch('data');
    }

    /**
     * @param array $package
     * @return array
     */
    public function addPackage(array $package): array
    {
        $data = apcu_fetch('data');
        $date = new \DateTime();
        $id = $date->getTimestamp() . 'X';
        $newPackage[$id] = $package;
        $newPackage[$id]['id'] = $id;
        $newPackage[$id]['price']['id'] = $id;
        $data = array_merge($data, $newPackage);
        apcu_store('data', $data);
        return $this->getPackageById($id);
    }

    /**
     * @param string $id
     * @param array $package
     * @return array
     */
    public function updatePackage(string $id, array $package): array
    {
        $data = apcu_fetch('data');
        unset($data[$id]);
        $updatedPackage[$id] = $package;
        $updatedPackage[$id]['id'] = $id;
        $updatedPackage[$id]['price']['id'] = $id;
        $data = array_merge($data, $updatedPackage);
        apcu_store('data', $data);
        return $this->getPackageById($id);
    }

    /**
     * @param string $id
     * @return array
     */
    public function removePackage(string $id): array
    {
        $data = apcu_fetch('data');
        $package = $data[$id];
        unset($data[$id]);
        apcu_store('data', $data);
        return $package;
    }

}