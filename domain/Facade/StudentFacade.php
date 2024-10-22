<?php
namespace domain\Facade;

use domain\Services\StudentService;
use Illuminate\Support\Facades\Facade;

 class StudentFacade extends Facade
 {
     protected static function getFacadeAccessor()
     {
         return StudentService::class;
     }
 }
