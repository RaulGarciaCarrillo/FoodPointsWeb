<?php

namespace App\Http\Controllers;

use App\Place;
use Illuminate\Http\Request;
use DB;
use App\Quotation;

class PlaceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($request)
    {
        $obj = json_decode($request, true);

        $place = new Place;
        $place->name = $obj{'name'};
        $place->address = $obj{'address'};
        $place->latitude = $obj{'latitude'};
        $place->longitude = $obj{'longitude'};
        $place->description = $obj{'description'};
      

        $place->save();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Place  $place
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ids = explode(',', $id);
        if($id == 0) {
            return DB::table('place')
            ->join('place_food', 'place.id', '=', 'place_food.place_id')
            ->join('foodType', 'place_food.foodType_id', '=', 'foodType.id')
            ->select(DB::raw('place.name as placeName, place.image, place.description'))
            ->distinct()
            ->get();
        } else {
            return DB::table('place')
            ->join('place_food', 'place.id', '=', 'place_food.place_id')
            ->join('foodType', 'place_food.foodType_id', '=', 'foodType.id')
            ->whereIn('foodType.id', $ids)
            ->select(DB::raw('place.name as placeName, place.image, place.description'))
            ->distinct()
            ->get();
        }        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Place  $place
     * @return \Illuminate\Http\Response
     */
    public function edit(Place $place)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Place  $place
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Place $place)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Place  $place
     * @return \Illuminate\Http\Response
     */
    public function destroy(Place $place)
    {
        //
    }

}
