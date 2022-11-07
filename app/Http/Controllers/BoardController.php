<?php

namespace App\Http\Controllers;

use App\Models\Board;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PHPUnit\Exception;

class BoardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $board = new Board();
        $board->name = $request->input('name');
        $board->link = "link";
        $board->path_img = $request->input('path_img');
        $board->description = $request->input('description');
        $board->save();
        DB::table('board_user')->insert([
            'board_id' => $board->id,
            'user_id' => auth()->user()->id,
        ]);
        return redirect()->route('frontoffice.board.show',$board);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Board  $board
     * @return \Illuminate\Http\Response
     */
    public function show(Board $board)
    {
        return view('theme.frontoffice.pages.board.show',$board);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Board  $board
     * @return \Illuminate\Http\Response
     */
    public function edit(Board $board)
    {
        return view('theme.frontoffice.pages.board.edit',[
            'board'=>$board,
            'users'=>$board->users,
            'roles' => Role::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Board  $board
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Board $board)
    {
        $boardN = Board::find($board->id);
        $boardN->name = $request->input('name');
        $boardN->description = $request->input('description');
        $boardN->path_img = $request->input('path_img');
        $boardN->save();
        //actualizar permisos de usuarios
        return redirect()->route('frontoffice.dashboard.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Board  $board
     * @return \Illuminate\Http\Response
     */
    public function destroy(Board $board)
    {
        $board->forceDelete();
        return redirect()->route('frontoffice.dashboard.index');
    }
    public function addUserBoard($role_id,$board_id){
        $user= auth()->user();
        if ($user){
            try {
                DB::table('board_user')->insert([
                    'board_id' => $board_id,
                    'user_id' => $user->id,
                ]);
                DB::table('board_user')->insert([
                    'role_id' => $role_id,
                    'user_id' => $user->id,
                ]);
            }catch (Exception $exception){
                return $exception;
            }
        }
        return redirect()->route('frontoffice.dashboard.index');
    }
}
