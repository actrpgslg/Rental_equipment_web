<?php
namespace App\Service;

use DeviceService;

class DeviceServiceService
{
    protected $Repository;
    public function __construct(DeviceServiceRepository $repository)
    {
     $this->Repository = $repository;
    }
}
