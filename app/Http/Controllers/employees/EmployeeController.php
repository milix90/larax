<?php

namespace App\Http\Controllers\employees;

use App\Http\Controllers\Controller;
use App\Repositories\EmployeeRepository;

class EmployeeController extends Controller
{
    private $users;

    public function __construct(EmployeeRepository $employee)
    {
        $this->users = $employee;
    }

    public function index()
    {
        $users = $this->users->all();
        return view('employee.all', compact('users'));
    }

    public function activateUser($id)
    {
        $this->users->activate($id);
        return back();
    }

    public function changeRole($id)
    {
        $this->users->role($id);
        return back();
    }
}
