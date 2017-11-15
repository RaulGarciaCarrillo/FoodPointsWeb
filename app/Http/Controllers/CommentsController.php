<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;
use DB;
use Auth;
use App\Quotation;
use DateTime;
use Carbon\Carbon;


class CommentsController extends Controller
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
    public function create(Request $request)
    {
        //
        $now = new DateTime();
        $mytime = Carbon::now();
        $comment = new Comment;
        $comment->comment = $request->input('comment');
        $comment->date = $now;
        $comment->users_id = Auth::user()->id;
        $comment->place_id = $request->input('place_id');
        $comment->save();

        return $this->show($comment->place_id);
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
        return DB::table('comment')
        ->join('users', 'users.id', '=', 'comment.users_id')
        ->where('place_id', '=', $id)
        ->select(DB::raw('comment, date, users.image as userimage, users.name as user'))
        ->orderByRaw('date ASC')
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
