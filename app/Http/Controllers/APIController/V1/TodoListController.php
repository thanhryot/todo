<?php

namespace App\Http\Controllers\APIController\V1;

use App\Http\Controllers\Controller;
use App\Model\ToDoList;
use App\Http\Requests\TodoRequest;
use App\Http\Resources\ToDoList as ToDoListResource;
use Illuminate\Http\Response;
use App\Repositories\ToDoListRepository;

class TodoListController extends Controller
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
        return ToDoListResource::collection($this->toDoListRepository->getAllByUserId(auth()->id()));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TodoRequest $request)
    {
        $todo = $this->toDoListRepository->createAndMakeActivity($request->item);

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
        $todo = $this->toDoListRepository->updateAndMakeActivity($request->item, $todo->id);

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
        $this->toDoListRepository->deleteAndMakeActivity($todo->item, $todo->id);

        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}
