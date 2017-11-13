<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

class foodTypeController extends Controller
{
    //
    public function get()
    {
    	$foodType = DB::table('foodType')->get();
        return $foodType;
    }

    public function getPlace($id)
    {
    	$foodType = DB::select("SELECT ft.id, ft.name, ft.src FROM place_food pf
								INNER JOIN foodType ft
								ON pf.foodType_id = ft.id
								WHERE pf.place_id = $id ");
        return $foodType;
    }

}
