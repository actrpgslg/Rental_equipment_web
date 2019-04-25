<?php
namespace App\Service;

use StudentService;

class StudentServiceService
{
    protected $Repository;
    public function __construct(StudentServiceRepository $repository)
    {
     $this->Repository = $repository;
    }
}
