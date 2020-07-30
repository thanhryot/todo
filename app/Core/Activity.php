<?php

namespace App\Core;

class Activity
{
    public static function makeMessage($action, $user, $item){

    	switch ($action) {

    		case 'create':
    			return "${user} created ${item}.";
    			break;

    		case 'update':
    			return "${user} updated ${item}.";
    			break;

    		case 'delete':
    			return "${user} deleted ${item}.";
    			break;
    	}

    }
}
