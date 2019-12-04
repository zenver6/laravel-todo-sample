<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\CreateTask;
use App\Http\Requests\EditTask;
use App\Models\Folder;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    public function index(Folder $folder)
    {
        // $folders = Folder::all();
        $folders = Auth::user()->folders()->get();

        $tasks = $folder->tasks()->get();
        // dd($folder);
        return view('tasks/index', [
            'folders' => $folders,
            'current_folder_id' => $folder->folder_id,
            'tasks' => $tasks
        ]);
    }

    public function showCreateForm(Folder $folder)
    {
        return view('tasks/create', [
            'folder' => $folder->folder_id
        ]);
    }

    public function create(Folder $folder, CreateTask $request)
    {
        $task = new Task();
        $task->title = $request->title;
        $task->due_date = $request->due_date;

        $folder->tasks()->save($task);

        return redirect()->route('tasks.index', [
            'folder' => $folder->folder_id
        ]);
    }

    public function showEditForm(Folder $folder, Task $task)
    {
        return view('tasks/edit', [
            'task' => $task
        ]);
    }

    public function edit(Folder $folder, Task $task, EditTask $request)
    {
        $task->title = $request->title;
        $task->status = $request->status;
        $task->due_date = $request->due_date;
        $task->save();

        return redirect()->route('tasks.index', [
            'folder' => $folder
        ]);
    }
}
