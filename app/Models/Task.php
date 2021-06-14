<?php

namespace App\Models;

use App\Traits\TaskHelper;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pipeline\Pipeline;

class Task extends Model
{
    use HasFactory, TaskHelper;

    protected $fillable = [
        'title',
        'description',
        'user_id',
        'assign_id',
        'status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function searchTasks()
    {
        $pipeline = app(Pipeline::class)
            ->send(Task::query()->latest())
            ->through([
                \App\Filters\Tasks\AssignId::class,
                \App\Filters\Tasks\Status::class,
                \App\Filters\Tasks\CreatedAt::class,
            ])
            ->thenReturn();

        $result = $pipeline->get();

        return $result;
    }
}
