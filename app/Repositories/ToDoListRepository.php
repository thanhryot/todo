<?php

namespace App\Repositories;

use App\Repositories\BaseRepository;
use App\Model\ToDoList;
use App\Model\Activity;
use App\Core\Activity as ActivityCore;

class ToDoListRepository extends BaseRepository
{
    const NUMBER_OF_PAGES = 10;

    public function model()
    {
        return ToDoList::class;
    }

    public function getAllByUserId($id)
    {
        return $this->where('user_id', $id)->paginate(self::NUMBER_OF_PAGES);
    }

    public function createAndMakeActivity($item)
    {
        $user_id = auth()->id();

        \DB::transaction(function () use ($item, $user_id){

            $todo = $this->create(['item' => $item, 'user_id' => $user_id]);

            Activity::create([
                'content' => ActivityCore::makeMessage('create', auth()->user()->name, $item), 
                'user_id' => $user_id
            ]);

            return $todo;
        });
    }

    public function updateAndMakeActivity($item, $id){

        \DB::transaction(function () use ($item, $id){

            $todo = $this->updateById($id, ['item' => $item]);

            Activity::create([
                'content' => ActivityCore::makeMessage('update', auth()->user()->name, $item), 
                'user_id' => auth()->id()
            ]);

            return $todo;

        });
    }

    public function deleteAndMakeActivity($item, $id){

        \DB::transaction(function() use ($item, $id){

            $this->deleteById($id);

            Activity::create([
                'content' => ActivityCore::makeMessage('delete', auth()->user()->name, $item), 
                'user_id' => auth()->id()
            ]);

        });
    }


    public function switchStatus($id){
        $todo = $this->getById($id);
        if($todo->is_done){
            $todo->is_done = 0;
        }else{
            $todo->is_done = 1;
        }
        $todo->save();
    }

}