<?php


namespace App\Repositories;


use App\Models\User;
use App\Repositories\Contracts\EmployeeInterface;

class EmployeeRepository implements EmployeeInterface
{
    public function all()
    {
        $users = User::query()->latest()->paginate(10);
        return $users;
    }

    public function activate($id)
    {
        $user = User::query()->find($id);
        $user['activate'] = ($user['activate'] === 0) ? 1 : 0;
        $user->save();
    }

    public function role($id)
    {
        $user = User::query()->find($id);
        $user['role'] = ($user['role'] === 0) ? 1 : 0;
        $user->save();
    }
}
