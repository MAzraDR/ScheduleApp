@extends('partials.navbar')

@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <div class="container mt-5">
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">Edit Task</div>
                            <div class="card-body">
                                <form action="{{ route('task.update', $task->id) }}" method="POST">
                                    @csrf
                                    @method('PUT') <!-- Menggunakan method PUT untuk update -->

                                    <div class="form-group">
                                        <label for="judul">Title:</label>
                                        <input type="text" class="form-control" id="judul" name="judul" value="{{ $task->judul }}" placeholder="Enter title" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="deskripsi">Description:</label>
                                        <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3" placeholder="Enter description" required>{{ $task->deskripsi }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="hari">Date:</label>
                                        <input type="date" class="form-control" id="hari" name="hari" value="{{ $task->hari }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="waktumulai">Start Time:</label>
                                        <input type="time" class="form-control" id="waktumulai" name="waktumulai" value="{{ $task->waktumulai }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="waktuselesai">End Time:</label>
                                        <input type="time" class="form-control" id="waktuselesai" name="waktuselesai" value="{{ $task->waktuselesai }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="lokasi">Location:</label>
                                        <input type="text" class="form-control" id="lokasi" name="lokasi" value="{{ $task->lokasi }}" placeholder="Enter location" required>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection