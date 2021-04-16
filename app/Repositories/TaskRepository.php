<?php


namespace App\Repositories;


use App\Models\Task;
use App\Repositories\Contracts\TaskInterface;
use Illuminate\Http\Request;

class TaskRepository implements TaskInterface
{

    public function all()
    {
        $tasks = Task::query()->latest()->paginate(10);

        return $tasks;
    }

    public function spanShot()
    {
        $snap = Task::query()->latest()->take(4);

        return $snap;
    }

    public function GetTask(Request $request)
    {
        $task = Task::query()->findOrFail($request['id']);

        return $task;
    }

    public function CreateTask(Request $request)
    {
        Task::query()->create([
            'title' => $request['title'],
            'description' => $request['description']
        ]);
    }

    public function UpdateTask(Request $request)
    {
        $msg = 'Task updated successfully';

        try {
            $newData = Task::query()->findOrFail($request['id']);

            if ($newData instanceof Task) {
                $newData->update([
                    'title' => $request['title'],
                    'description' => $request['description']
                ]);
            }
        } catch (\Exception $e) {
            $msg = $e->getMessage();
        }

        return $msg;
    }

    public function DeleteTask($id)
    {
        $msg = 'Task deleted successfully';
        try {
            $task = Task::query()->findOrFail($id);

            if ($task instanceof Task) {
                $task->delete();
            }
        } catch (\Exception $e) {
            $msg = 'Error! Not a correct instance.';
        }

        return $msg;
    }
}
