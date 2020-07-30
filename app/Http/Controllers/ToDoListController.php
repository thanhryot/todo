<?php

namespace App\Http\Controllers;

use App\Model\ToDoList;
use App\Model\Activity;
use App\Http\Requests\TodoRequest;
use Illuminate\Http\Request;
use App\Core\Activity as ActivityCore;

class ToDoListController extends Controller
{
    const NUMBER_OF_PAGES = 10;

    public function __construct()
    {
        $this->authorizeResource(ToDoList::class, 'todo');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $todo_lists = ToDoList::where('user_id', auth()->id())->paginate(self::NUMBER_OF_PAGES);

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

        $user_id = auth()->id();

        \DB::transaction(function () use ($request, $user_id){

            ToDoList::create(['item' => $request->item, 'user_id' => $user_id]);

            Activity::create([
                'content' => ActivityCore::makeMessage('create', auth()->user()->name, $request->item), 
                'user_id' => $user_id
            ]);

        });

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

        \DB::transaction(function() use ($request, $todo){

            $todo->item = $request->item;
            $todo->save();

            Activity::create([
                'content' => ActivityCore::makeMessage('update', auth()->user()->name, $request->item), 
                'user_id' => auth()->id()
            ]);

        });
        
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
        \DB::transaction(function() use ($todo){

            $todo->delete();

            Activity::create([
                'content' => ActivityCore::makeMessage('delete', auth()->user()->name, $todo->item), 
                'user_id' => auth()->id()
            ]);

        });
        
        return redirect()->route('todos.index');
    }

    public function switch(Request $request){
        $todo = ToDoList::find($request->id);
        if($todo->is_done){
            $todo->is_done = 0;
        }else{
            $todo->is_done = 1;
        }
        $todo->save();

        return response()->json(['message' => 'Changed successfully!']);
    }
}
