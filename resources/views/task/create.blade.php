@extends('layouts.app')
@section('content')
    
  <div class="container">
    <div class="row">
        <div class="col-lg-12 ">
            <h2 class="section-subheading text-center "> Add a new task in the project {{$project->name}}   </h2>		 
            <h2 class="section-subheading text-right "> <a href="{{route('project.show', $project->id)}}">Go back to tasks</a>    </h2>		 
        </div>	
        <br>
        <br>
        <br>
        <br>
        <div class="col-lg-12">
    
            <form method="post" action="{{route('task.store')}}">
                {{ csrf_field() }}
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="Project name"> Task name   <span class="amust">*</span> </label>
                        <input type="text" class="form-control" name="name" required placeholder="Enter the name of the task">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="Project name"> Task priority   <span class="amust">*</span> </label>
                        <input type="number" class="form-control" name="priority" required placeholder="Enter the priority of the task">
                    </div>
                </div>

                <input type="hidden" class="form-control" name="project_id" required value="{{$project->id}}">

                       


                <button type="submit" class="btn btn-primary text-center" > Save  </button>
            </form>
        </div>       
    </div>
    <!-- /.row -->
  </div><!-- /.container-fluid -->
@endsection