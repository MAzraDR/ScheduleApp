<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class DashboardController extends Controller
{
    public function index(TaskController $taskController)
    {
        // Mengambil ID pengguna yang sedang login
        $userId = Auth::id();

        // Memanggil metode index dari TaskController untuk mendapatkan data tugas
        $tasks = $taskController->index()->where('user_id', $userId);

        // Mengambil isAdmin dari session
        $isAdmin = session('isAdmin');

        if ($tasks) {
            // Mengambil nama pengguna
            $userName = Auth::user()->name;
            
            $nearestTask = $tasks->sortBy('hari')->first();
            if ($nearestTask) {
                Session::flash('nearestTask', $nearestTask->judul);
            } else {
                Session::flash('nearestTask', ' - ');
            }

            // Mengirimkan data tugas ke tampilan dashboard
            return view('dashboard', compact('tasks', 'userName', 'isAdmin'));
        } else {
            return redirect()->route('auth.login');
        }
    }
}
