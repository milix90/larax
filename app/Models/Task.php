<?php

namespace App\Models;

use App\Traits\TaskHelper;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory,TaskHelper;

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
}
