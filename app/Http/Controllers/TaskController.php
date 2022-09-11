<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{ 
    public function index()
    {
        $tasks = Task::all();
        return response()->json($tasks);
    } 

    public function create()
    {
        
    }
 
    public function store(Request $request)
    {
        Task::create($request->all());
    } 

    public function show($id)
    {
        //
    } 

    public function edit($id)
    {
        $task = Task::find($id); 
        return response()->json($task);
    }
    
    public function update(Request $request, $id)
    {
        $task = Task::find($id);
        $task->update($request->all());
        return response()->json('edit');
    }
     
    public function destroy($id)
    {
        $task = Task::find($id);
        $task->delete();
    }
}
