<?php

namespace App\Http\Controllers;

use App\Favorite;
use Illuminate\Http\Request;
use DB;
use App\Quotation;
use Auth;

class favoriteController extends Controller
{

    public function removeFavorite($id)
    {
        $favorite = Favorite::where('users_id', Auth::user()->id)
        ->where('place_id', $id)
        ->delete();
        return 'ok';
    }

    public function addFavorite($id)
    {
        $favorite = new Favorite;
        $favorite->users_id = Auth::user()->id;
        $favorite->place_id = $id;
        $favorite->save();     
        return $favorite;
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return DB::table('place')
        ->join('favorite', 'place.id', '=', 'favorite.place_id')
        ->join('users', 'users.id', '=', 'favorite.users_id')
        ->where('users.id', '=', Auth::user()->id)
        ->select(DB::raw('place.name as placeName, place.image, place.description, place.id'))
        ->distinct()
        ->get();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
