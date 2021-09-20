<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Project;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
       
        $project = Project::find($request->id);
        return view('task.create', ['project'=>$project]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $task = Task::create([
            'name' => $request->name,
            'priority' => $request->priority,
            'project_id' => $request->project_id,
        ]);
        if($task){
            return redirect()->route('project.show',$request->project_id)
            ->with('success' , 'New task added with success');
        }
        return back()->withInput()->with('errors', 'Error while adding a new project');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {
        return view('task.edit',['task'=>$task]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task $task)
    {
        $taskUpdate = Task::where('id', $task->id)
            ->update([
                'name'=>$request->name,
                'priority'=>$request->priority
            ]);
        
        if($taskUpdate){
            return redirect()->route('project.show',$task->project_id)
            ->with('success' , 'task updated successfully');
        }
        return back()->withInput()->with('error' , 'task could not be updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        $task = Task::find( $task->id);
        
        $project_id = $task->project_id;
		if($task->delete()){
            
            //redirect
            return redirect()->route('project.show',$project_id)
            ->with('success' , 'task deleted successfully');
        }

        return back()->withInput()->with('error' , 'task could not be deleted');
    }
}
