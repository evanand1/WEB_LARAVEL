<?php

namespace App\Http\Controllers;

use App\Models\ToDo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ToDoController extends Controller

{
    public function index(Request $request)
    {
        $todos = ToDo::latest()->get();
        return view('todo.index', compact('todos'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'task' => 'required|string|max:255',
        ]);

        ToDo::create([
            'task' => $validated['task'],
            'is_done' => false,
        ]);

        return redirect()->route('todo.index');
    }
    public function update($id)
{
    $todo = ToDo::findOrFail($id);

    // Toggle status is_done
    $todo->is_done = !$todo->is_done;
    $todo->save();

    return redirect()->back();
}

public function destroy($id)
{
    $todo = ToDo::findOrFail($id);

    // Hapus jika sudah selesai
    if ($todo->is_done) {
        $todo->delete();
    }

    return redirect()->back();
}

}

