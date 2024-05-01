@extends('partials.navbar')

@section('content')

@if (session('success'))
<div class="alert alert-success">
    {{session('success')}}
</div>
@endif
@if (session('nearestTask'))
<div class="row justify-content-end">
    <div class="col-4">
        <div class="alert alert-primary alert-dismissible fade show" role="alert" id="myAlert">
            <p>Jadwal Terdekat : <span class="fw-bold">{{session('nearestTask')}}</span></p>
            <button type="button" class="btn-close" onclick="closeAlert()" aria-label="Close"></button>
        </div>
    </div>
</div>
@endif
<div class="container">
    <!-- Begin Content Header -->
    <div class="row">
        <div class="col">
            <h1 class="h3 mb-4 text-gray-800">Your Tasks</h1>
        </div>

        <div class="row d-flex">
            <div class="col-3">
                <button type="button" class="btn btn-dark"><a href="{{ route('task.create') }}" class="text-white text-decoration-none">New Task</a></button>
            </div>
        </div>

        <!-- End Content Header-->

        <!-- Begin Tasks Cards -->
        <div class="row mt-4">
            @if($tasks->count() > 0)
            <table class="table table-hover" id="myTable">
                <thead>
                    <tr>
                        <th scope="col">Title</th>
                        <th scope="col">Description</th>
                        <th scope="col">Day</th>
                        <th scope="col">Start Time</th>
                        <th scope="col">End Time</th>
                        <th scope="col">Lokasi</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tasks as $task)
                    <tr>
                        <td>{{ $task->judul }}</td>
                        <td>{{ $task->deskripsi }}</td>
                        <td>{{ $task->hari }}</td>
                        <td>{{ $task->waktumulai }}</td>
                        <td>{{ $task->waktuselesai }}</td>
                        <td>{{ $task->lokasi }}</td>
                        <td class="d-flex">
                            <a href="{{ route('task.show', $task->id) }}" class="btn btn-primary">Edit</a>
                            <form action="{{ route('task.destroy', $task->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" id="delete">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @else
            <div class="col">
                <div class="alert alert-info" role="alert">
                    You don't have any tasks yet.
                </div>
            </div>
            @endif
        </div>
        <!-- End Tasks Cards -->

    </div>



    @endsection