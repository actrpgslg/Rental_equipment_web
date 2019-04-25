<?php
namespace App\Service;

use MapService;

class MapServiceService
{
    protected $Repository;
    public function __construct(MapServiceRepository $repository)
    {
     $this->Repository = $repository;
    }
}
