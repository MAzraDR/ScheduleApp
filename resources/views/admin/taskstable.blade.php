@extends('partials.navbar')
@section('content')
<div class="container-fluid">


    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Users Data</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover" id="myTable">
                    <thead>
                        <tr>
                            <th scope="col">User ID</th>
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
                            <td>{{ $task->user_id }}</td>
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
            </div>
        </div>
    </div>
</div>

@endsection