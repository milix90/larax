<?php


namespace App\Repositories\Contracts;


interface EmployeeInterface
{
    public function all();
    public function activate($id);
    public function role($id);
}
