<?php

namespace App\Http\Controllers;

use App\Model\ToDoList;
use App\Http\Requests\TodoRequest;

class ToDoListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('frontend_v1.pages.todos.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('frontend_v1.pages.todos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TodoRequest $request)
    {
        $todo = new ToDoList;

        $todo->item = $request->item;
        $todo->user_id = auth()->id();
        $todo->save();

        return redirect()->route('todos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\ToDoList  $todo
     * @return \Illuminate\Http\Response
     */
    public function show(ToDoList $todo)
    {
        return view('frontend_v1.pages.todos.show', compact('todo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\ToDoList  $todo
     * @return \Illuminate\Http\Response
     */
    public function edit(ToDoList $todo)
    {
        return view('frontend_v1.pages.todos.edit', compact('todo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\ToDoList  $todo
     * @return \Illuminate\Http\Response
     */
    public function update(TodoRequest $request, ToDoList $todo)
    {
        
        if($todo->user_id == auth()->id()){
            $todo->item = $request->item;
            $todo->save();
        }
        
        return redirect()->route('todos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\ToDoList  $todo
     * @return \Illuminate\Http\Response
     */
    public function destroy(ToDoList $todo)
    {
        $todo->delete();
        return redirect()->route('todos.index');
    }

    public function switch($id){
        $todo = ToDoList::find($id);
        if($todo->is_done){
            $todo->is_done = 0;
        }else{
            $todo->is_done = 1;
        }
        $todo->save();
        
        return redirect()->route('todos.index');
    }
}
