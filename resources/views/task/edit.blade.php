@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card border border-dark">
                <div class="card-header">PHP - Simple To Do List App</div>

                <div class="card-body bg-dark text-white">

                    <div class="row">
                        <div class="col-10">
                            <form action="{{ route('updateTask', $task->id) }}" method="post">
                                @method('PUT') 
                                @csrf
                                    
                                <div class="form-group">
                                    <label for="taskname" class="col-form-label text-white">Task Name: </label>
                                    <input type="text" name="taskname" id="taskname" class="form-control" value="{{ $task->task }}">
                                </div>
                                <div class="form-group">
                                    <label for="status" class="col-form-label text-white">Status: </label>
                                    <select name="status" id="status" class="form-control" style="height:45px">
                                        <option @if($task->status == "pending") selected @endif value="pending">Pending</option>
                                        <option @if($task->status == "done") selected @endif value="done">Done</option>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary">Update Task</button>
                                <a href="{{ route('home') }}" class="btn btn-info">Back to List</a>
                            
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection
