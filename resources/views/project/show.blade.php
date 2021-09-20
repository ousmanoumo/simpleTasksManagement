@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center ">
                <h2 class="section-subheading text-center"> List of tasks of project {{ $project->name }} </h2>
                <h2 class="text-left"><a href="{{ route('task.create', [ 'id'=>$project->id]) }}">add a task</a></h2>
            </div>
            <div>
                <table class="table table-striped">
                    <tr>
                        <th>task name</th>
                        <th>task priority</th>
                        <th></th>
                        <th></th>
                    </tr>
                    @foreach ($project->tasks as $task)
                        <tr>
                            <td>{{ $task->name }}</td>
                            <td>{{ $task->priority }}</td>
                            <td class="text-danger"><a href="{{ route('task.edit', $task->id) }}">edit</a> </td>
                            <td class="text-danger">
                                <a class="btn btn-danger text-center" href="#" onclick="
                                    var result = confirm('Do you really want to delete this task {{ $task->name}}?');
                                        if( result ){
                                                event.preventDefault();
                                                document.getElementById('deleteform{{ $task->id }}').submit();
                                        }
                                            ">
                                    Delete
                                </a>
                                <form id="deleteform{{$task->id}}" name="deleteform" action="{{ route('task.destroy',[$task->id]) }}" 
                                    method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="_method" value="DELETE">       
                                </form>
                            </td>
                            <td></td>
                        </tr>
                    @endforeach
                </table>

            </div>
            <br>
            <br>
            <br>
            <br>
            <div class="col-lg-12">

            </div>
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
@endsection
