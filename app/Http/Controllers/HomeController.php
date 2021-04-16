<?php

namespace App\Http\Controllers;

use App\Repositories\TaskRepository;
use Illuminate\Contracts\Support\Renderable;

class HomeController extends Controller
{
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
     * @return Renderable
     */
    public function index()
    {
        $lastTasks = $this->tasks->spanShot();
        return view('home', compact($lastTasks));
    }
}
