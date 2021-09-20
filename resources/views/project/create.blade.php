@extends('layouts.app')
@section('content')
    
  <div class="container">
    <div class="row">
        <div class="col-lg-12 text-center text-center">
            <h2 class="section-subheading "> Ajouter un nouveau partenaire   </h2>		 
        </div>	
        <br>
        <br>
        <br>
        <br>
        <div class="col-lg-12">
    
            <form method="post" action="{{route('project.store')}}">
                {{ csrf_field() }}
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="Project name"> name of the project   <span class="amust">*</span> </label>
                        <input type="text" class="form-control" name="name" required placeholder="Enter the name of the project">
                    </div>
                </div>

                       


                <button type="submit" class="btn btn-primary text-center" > Save  </button>
            </form>
        </div>       
    </div>
    <!-- /.row -->
  </div><!-- /.container-fluid -->
@endsection