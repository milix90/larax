<?php


namespace App\Traits;


use App\Models\Task;
use App\Models\User;
use Carbon\Carbon;

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

    public function taskStartDates()
    {
        $dates = Task::all()->map(function ($item) {
            return Carbon::parse($item['created_at'])->format('Y-m-d');
        });

        $dates = array_unique($dates->toArray());

        return $dates;
    }
}
