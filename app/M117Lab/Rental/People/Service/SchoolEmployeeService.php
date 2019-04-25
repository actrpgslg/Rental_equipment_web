<?php
namespace App\Service;

use SchoolEmployeeService;

class SchoolEmployeeServiceService
{
    protected $Repository;
    public function __construct(SchoolEmployeeServiceRepository $repository)
    {
     $this->Repository = $repository;
    }
}
