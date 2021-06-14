<?php


namespace App\Repositories\Contracts;

use Illuminate\Http\Request;

interface TaskInterface
{
    public function all();
    public function GetTask($id);
    public function CreateTask(Request $request);
    public function UpdateTask(Request $request);
    public function DeleteTask($id);
}
