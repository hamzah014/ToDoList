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
                            <form action="{{ route('addTask') }}" method="post">
                                @method('POST') 
                                @csrf
                                    
                                <div class="form-group">
                                    <label for="taskname" class="col-form-label text-white">Task Name: </label>
                                    <input type="text" name="taskname" id="taskname" class="form-control">
                                </div>
                                <button type="submit" class="btn btn-primary">Add Task</button>
                            
                            </form>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-12">
                            <table class="w3-table w3-bordered w3-centered">
                                <tr>
                                    <th>#</th>
                                    <th>Task</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                @php
                                    $no = 0;
                                @endphp

                                @foreach ($tasks as $task)

                                @php $no++ @endphp
                                
                                <tr>
                                    <td>{{ $no }}</td>
                                    <td>{{ $task->task }}</td>
                                    <td>{{ ucfirst($task->status) }}</td>
                                    <td>
                                        <a href="{{ route('editTask',$task->id) }}" class="btn btn-sm btn-success"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                        <a href="{{ route('deleteTask',$task->id) }}" class="btn btn-sm btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                            </table>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection
