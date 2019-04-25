<?php
namespace App\Service;

use DevicesSpecificationService;

class DevicesSpecificationServiceService
{
    protected $Repository;
    public function __construct(DevicesSpecificationServiceRepository $repository)
    {
     $this->Repository = $repository;
    }
}
