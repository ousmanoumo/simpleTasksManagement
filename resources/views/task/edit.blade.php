@extends('layouts.app')
@section('content')
    
  <div class="container">
    <div class="row">
        <div class="col-lg-12 text-center ">
            <h2 class="section-subheading text-center "> Update tasks information  </h2>		
            <h2 class="section-subheading text-right "> <a href="{{route('project.show', $task->project_id)}}">Go back to tasks</a>    </h2> 
        </div>	
        <br>
        <br>
        <br>
        <br>
        <div class="col-lg-12">
    
            <form method="post" action="{{route('task.update',[$task->id])}}">
                <input type="hidden" name="_method" value="put">
                {{ csrf_field() }}
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="Project name"> Task name   <span class="amust">*</span> </label>
                        <input type="text" class="form-control" name="name" required placeholder="Enter the name of the task" value={{$task->name}}>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="Project name"> Task priority   <span class="amust">*</span> </label>
                        <input type="number" class="form-control" name="priority" required placeholder="Enter the priority of the task" value={{$task->priority}}>
                    </div>
                </div>

                <input type="hidden" class="form-control" name="project_id" required value="{{$task->project_id}}">

                       


                <button type="submit" class="btn btn-primary text-center" > Update  </button>
            </form>
        </div>       
    </div>
    <!-- /.row -->
  </div><!-- /.container-fluid -->
@endsection