<?php
namespace App\Service;

use DeviceClassificationService;

class DeviceClassificationServiceService
{
    protected $Repository;
    public function __construct(DeviceClassificationServiceRepository $repository)
    {
     $this->Repository = $repository;
    }
}
