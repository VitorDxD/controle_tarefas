@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Tasks List
                    <a href="{{ route('task.create') }}" class="float-end">New Task +</a>
                </div>

                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Task</th>
                                <th scope="col">Limit Date</th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                            </tr>
                        </thead>

                        <tbody class="table-group-divider">
                            @forelse ($tasks as $task)                                
                                <tr>
                                    <th scope="row">{{ $task->id }}</th>
                                    <td>{{ $task->task }}</td>
                                    <td>{{ date('d/m/Y', strtotime($task->limit_date)) }}</td>
                                    <td><a href="{{ route('task.edit', ['task' => $task->id]) }}">Edit</a></td>
                                    <td>
                                        <form id="form_{{ $task->id }}" action="{{ route('task.destroy', ['task' => $task->id]) }}" method="post">
                                            @method('DELETE')
                                            @csrf
                                        </form>
                                        <a href="#" onclick="document.querySelector('#form_{{ $task->id }}').submit()">Delete</a>
                                    </td>
                                </tr>
                            @empty
                                <tr>You don't have tasks</tr>
                            @endforelse
                        </tbody>
                    </table>

                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                            <li class="page-item"><a class="page-link" href="{{ $tasks->previousPageUrl() }}">Previous</a></li>

                            @for ($i = 1; $i <= $tasks->lastPage(); $i++)

                                <li class="page-item {{ $tasks->currentPage() == $i ? 'active' : '' }}">
                                    <a class="page-link" href={{ $tasks->url($i) }}>
                                        {{ $i }}
                                    </a>
                                </li>

                            @endfor

                            <li class="page-item"><a class="page-link" href="{{ $tasks->nextPageUrl() }}">Next</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
