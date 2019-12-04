<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Folder;
use App\Http\Requests\CreateFolder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FolderController extends Controller
{
    public function showCreateForm()
    {
        return view('folders/create');
    }

    public function create(CreateFolder $request)
    {
        $folder = new Folder();
        $folder->title = $request->title;
        // $folder->save();
        Auth::user()->folders()->save($folder);

        return redirect()->route('tasks.index', [
            'id' => $folder->folder_id
        ]);
    }
}
