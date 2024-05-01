<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::all();
        return  $tasks;
    }

    public function indexadmin()
    {
        $tasks = Task::all();
        return view('admin.taskstable', ['tasks' => $tasks]);
    }

    public function create()
    {
        return view('tasks.newtask');
    }

    // Menyimpan task baru
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'judul' => 'required|string',
            'deskripsi' => 'required|string',
            'hari' => 'required|date',
            'waktumulai' => 'required',
            'waktuselesai' => 'required',
            'lokasi' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        // Mendapatkan ID pengguna yang sedang login
        $userId = Auth::id();

        // Simpan tugas dengan user_id yang sesuai
        $task = new Task($validator->validated());
        $task->user_id = $userId;
        $task->save();

        Session::flash('success', 'Data Berhasil Ditambahkan');

        return redirect()->route('dashboard');

    }

    // Menampilkan detail task
    public function show($id)
    {
        $task = Task::find($id);

        return view('tasks.edittask', compact('task'));
    }

    // Memperbarui task
    public function update(Request $request, $id)
    {
        $task = Task::find($id);

        $validator = Validator::make($request->all(), [
            'judul' => 'string',
            'deskripsi' => 'string',
            'hari' => 'date',
            'waktumulai' => 'date_format:H:i:s',
            'waktuselesai' => 'date_format:H:i:s',
            'lokasi' => 'string',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        $task->update($validator->validated());

        Session::flash('success', 'Data Berhasil Diedit');
        return redirect(route('dashboard'));
    }

    // Menghapus task
    public function destroy($id)
    {
        $task = Task::find($id);

        $task->delete();
        return redirect(route('dashboard'));
    }
}
