<?php
namespace App\Service;

use SpaceService;

class SpaceServiceService
{
    protected $Repository;
    public function __construct(SpaceServiceRepository $repository)
    {
     $this->Repository = $repository;
    }
}
