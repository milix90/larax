<?php


namespace App\Traits;


use App\Models\User;

trait TaskHelper
{
    public function assignUser($user, $assign)
    {
        $name = null;
        //id is equal with assign_id
        if (auth()->user()->role === 1 && $user !== $assign && $user === auth()->user()->id) {
            $user = User::query()->find($assign);
            $name = 'Assigned to ' . $user['name'];
        }

        return $name;
    }
}
