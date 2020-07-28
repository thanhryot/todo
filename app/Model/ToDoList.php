<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\User;

class ToDoList extends Model
{
	protected $table = 'todo_lists';
	
    public function user(){
    	return $this->beLongsTo(User::class);
    }

}
