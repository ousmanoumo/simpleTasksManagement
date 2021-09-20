@extends('layouts.app')
@section('content')

<div class="container">
    <h2 class="text-center">List of projects    <a class="text-primary" href="{{route('project.create')}}" >New project</a></h2>
    @foreach ($projects as $project)
       
     <a class="btn btn-primary" href="/project/{{$project->id}}">{{$project->name}}</a>
    @endforeach
</div>
    
@endsection
