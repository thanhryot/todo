<?php

namespace App\Http\Controllers\APIController\V1;

use App\Http\Controllers\Controller;
use App\Model\ToDoList;
use App\Http\Requests\TodoRequest;
use App\Http\Resources\ToDoList as ToDoListResource;
use Illuminate\Http\Response;

class TodoListController extends Controller
{
    const NUMBER_OF_PAGES = 25;

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
        return ToDoListResource::collection(ToDoList::paginate(self::NUMBER_OF_PAGES));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TodoRequest $request)
    {
        $todo = ToDoList::create([
            'item' => $request->item,
            'user_id' => auth()->id()
        ]);

        return response()->json($todo, Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\ToDoList  $todo
     * @return \Illuminate\Http\Response
     */
    public function show(ToDoList $todo)
    {
        return new ToDoListResource($todo);
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
        $todo->update($request->all());

        return response()->json($todo, Response::HTTP_OK);
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

        return response()->json("Deleted", Response::HTTP_NO_CONTENT);
    }
}
