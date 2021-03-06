<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Repositories\TaskRepository;
use App\Traits\HomeHelper;

class HomeController extends Controller
{
    use HomeHelper;

    private $tasks;

    /**
     * Create a new controller instance.
     *
     * @param TaskRepository $taskRepository
     */
    public function __construct(TaskRepository $taskRepository)
    {
        $this->tasks = $taskRepository;
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return void
     */
    public function index()
    {
        $lastTasks = $this->tasks->spanShot();
        $users = User::query()->where('role', '<>', 1)->get();

        return view('home', compact('lastTasks', 'users'));
    }
}
