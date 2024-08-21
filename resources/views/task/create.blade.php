@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Add Task</div>

                <div class="card-body">
                    <form method="post" action="{{ route('task.store') }}">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Task Description</label>
                            <input type="text" class="form-control" name="task" placeholder="Study for the test" required>
                            
                            @if ($errors->has('task'))
                                <div class='text-danger'>{{ $errors->first('task') }}</div>
                            @endif

                        </div>
                
                        <div class="mb-3">
                            <label class="form-label">Limit Date</label>
                            <input type="date" class="form-control" name="limit_date" min="{{ date('Y-m-d') }}" required>
                            
                            @if ($errors->has('limit_date'))
                                <div class='text-danger'>{{ $errors->first('limit_date') }}</div>
                            @endif
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection