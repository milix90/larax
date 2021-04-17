<?php

namespace App\Observers;

use App\Models\User;

class EmployeeRegisterObserver
{
    /**
     * Handle the User "created" event.
     *
     * @param \App\Models\User $user
     * @return void
     */
    public function created(User $user)
    {
        if (User::all()->count() === 1) {
            $employee = User::query()->find($user['id']);

            $employee['name'] = 'Master';
            $employee['role'] = 1;
            $employee['activate'] = 1;
            $employee->save();
        }
    }
}
