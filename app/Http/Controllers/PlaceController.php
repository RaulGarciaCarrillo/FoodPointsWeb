<?php

namespace App\Http\Controllers;

use App\Place;
use App\PlaceFood;
use Auth;
use Illuminate\Http\Request;
use DB;
use App\Quotation;

class PlaceController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
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
    public function create(Request $request)
    {
        $file_tmp= $_FILES['image']['tmp_name'];
        $data = file_get_contents( $file_tmp );
        $base64 = base64_encode($data);

        $place = new Place;
        $place->name = $request->input('name');
        $place->address = $request->input('address');
        $place->latitude = $request->input('latitude');
        $place->longitude = $request->input('longitude');
        $place->description = $request->input('description');
        $place->image = $base64;      
        $place->save();
        
        $foodTypeArray = explode(",", $request->input('foodType'));

        foreach ($foodTypeArray  as &$valor) {
            $placeFood = new PlaceFood;
            $placeFood->place_id = $place->id;
            $placeFood->foodType_id = $valor;
            $placeFood->save();
        }

        return $place;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function consultar($id)
    {
        return DB::table('place')->where('place.id','=',$id);
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
            ->select(DB::raw('place.name as placeName, place.image, place.description, place.id, place.latitude, place.longitude, place.address, favorite.place_id isFavorite'))
            ->leftJoin('favorite', function($leftJoin)
                {
                    $leftJoin->on('place.id', '=', 'favorite.place_id')
                         ->where('favorite.users_id', '=', Auth::user()->id);
                })
            ->distinct()
            ->get();
        } else {
            return DB::table('place')
            ->join('place_food', 'place.id', '=', 'place_food.place_id')
            ->join('foodType', 'place_food.foodType_id', '=', 'foodType.id')
            ->whereIn('foodType.id', $ids)
            ->select(DB::raw('place.name as placeName, place.image, place.description, place.id, place.latitude, place.longitude, place.address, favorite.place_id isFavorite'))
            ->leftJoin('favorite', function($leftJoin)
                {
                    $leftJoin->on('place.id', '=', 'favorite.place_id')
                         ->where('favorite.users_id', '=', Auth::user()->id);
                })
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
