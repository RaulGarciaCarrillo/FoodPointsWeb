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

}
