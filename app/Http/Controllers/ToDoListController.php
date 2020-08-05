<?php

namespace App\Http\Controllers;

use App\Model\ToDoList;
use App\Model\Activity;
use App\Http\Requests\TodoRequest;
use Illuminate\Http\Request;
use App\Repositories\ToDoListRepository;

class ToDoListController extends Controller
{
    protected $toDoListRepository;

    public function __construct(ToDoListRepository $toDoListRepository)
    {
        $this->toDoListRepository = $toDoListRepository;
        $this->authorizeResource(ToDoList::class, 'todo');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $todo_lists = $this->toDoListRepository->getAllByUserId(auth()->id());

        return view('frontend_v1.pages.todos.index', compact('todo_lists'));
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

        $this->toDoListRepository->createAndMakeActivity($request->item);

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

        $this->toDoListRepository->updateAndMakeActivity($request->item, $todo->id);
        
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
        $this->toDoListRepository->deleteAndMakeActivity($todo->item, $todo->id);
        
        return redirect()->route('todos.index');
    }

    public function switch(Request $request){

        $this->toDoListRepository->switchStatus($request->id);

        return response()->json(['message' => 'Changed successfully!']);
    }
}
