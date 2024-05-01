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
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>                            
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $data)
                        <tr>
                            <td>{{ $data->name }}</td>
                            <td>{{ $data->email }}</td>                         
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection