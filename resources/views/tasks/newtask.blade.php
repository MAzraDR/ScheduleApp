@extends('partials.navbar')

@section('content')
<div class="container">
    <div class="row">
        <div class="col">           
            <div class="container mt-5">
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">Add New Task</div>
                            <div class="card-body">
                                <form action="{{ route('task.store') }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label for="judul">Title:</label>
                                        <input type="text" class="form-control" id="judul" name="judul" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="deskripsi">Description:</label>
                                        <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3"
                                            required></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="hari">Date:</label>
                                        <input type="date" class="form-control" id="hari" name="hari" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="waktumulai">Start Time:</label>
                                        <input type="time" class="form-control" id="waktumulai" name="waktumulai"
                                            required>
                                    </div>
                                    <div class="form-group">
                                        <label for="waktuselesai">End Time:</label>
                                        <input type="time" class="form-control" id="waktuselesai" name="waktuselesai"
                                            required>
                                    </div>
                                    <div class="form-group">
                                        <label for="lokasi">Location:</label>
                                        <input type="text" class="form-control" id="lokasi" name="lokasi" required>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Submit</button>
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