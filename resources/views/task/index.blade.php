@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Tasks List</div>

                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Task</th>
                                <th scope="col">Limit Date</th>
                            </tr>
                        </thead>

                        <tbody class="table-group-divider">
                            @foreach ($tasks as $key => $task)                                
                                <tr>
                                    <th scope="row">{{ $task['id'] }}</th>
                                    <td>{{ $task['task'] }}</td>
                                    <td>{{ date('d/m/Y', strtotime($task['limit_date'])) }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
