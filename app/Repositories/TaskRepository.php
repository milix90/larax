<?php


namespace App\Repositories;


use App\Models\Task;
use App\Repositories\Contracts\TaskInterface;
use Illuminate\Http\Request;

class TaskRepository implements TaskInterface
{
    public function all()
    {
        $all = Task::query()->latest();
        //display task according to user role
        $tasks = auth()->user()->role === 1 ? $all :
            $all->where('assign_id', auth()->user()->id);

        return $tasks->paginate(10);
    }

    public function spanShot()
    {
        //display last 4 tasks in home page
        $tasks = Task::query()->latest();
        if ($tasks->count() !== 0) {
            $snap = auth()->user()->role === 1 ? $tasks :
                $tasks->where('assign_id', auth()->user()->id);

            $res = $snap->get()->take(4);
        } else {
            $res = 'No Tasks Found!';
        }
        return $res;
    }

    public function GetTask($id)
    {
        $task = Task::query()->findOrFail($id);
        return $task;
    }

    public function CreateTask(Request $request)
    {
        Task::query()->create([
            'title' => $request['title'],
            'description' => $request['description'],
            'user_id' => auth()->user()->id,
            'assign_id' => auth()->user()->role === 0 || !is_numeric($request['assign_id']) ?
                auth()->user()->id : $request['assign_id']
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
                    'description' => $request['description'],
                    'assign_id' => auth()->user()->role === 0 || !is_numeric($request['assign_id']) ?
                        auth()->user()->id : $request['assign_id']
                ]);
            }
        } catch (\Exception $e) {
            $msg = $e->getMessage();
        }

        return $msg;
    }

    public function TaskStatus($id)
    {
        $task = Task::query()->find($id);
        //update task status, while done
        if ($task instanceof Task && $task['status'] === 0) {
            $task['status'] = 1;
            $task->save();
        }
    }

    public function DeleteTask($id)
    {
        try {
            $task = Task::query()->findOrFail($id);

            if ($task instanceof Task) {
                $task->delete();
            }
        } catch (\Exception $e) {
            return 'Error! Not a correct instance.';
        }
    }
}
