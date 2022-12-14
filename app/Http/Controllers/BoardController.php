<?php

namespace App\Http\Controllers;

use App\Events\BoardUpdate;
use App\Models\Board;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PHPUnit\Exception;

class BoardController extends Controller
{
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

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $role_id = 2;
        try {
            $user = auth()->user();
            $board = new Board();
            $board->name = $request->input('name');
            $board->link = "link";
            $board->path_img = $request->input('path_img');
            $board->description = $request->input('description');
            $board->save();
            DB::table('board_user')->insert([
                'board_id' => $board->id,
                'user_id' => $user->id,
            ]);
            DB::table('role_user')->insert([
                'role_id' => $role_id,
                'user_id' => $user->id,
                'board_id' => $board->id,
            ]);
            $q = DB::table('permissions')->where('name','=','view-anfitrion-board')->get();
            DB::table('permission_user')->insert([
                'permission_id' => $q[0]->id,
                'user_id' => $user->id,
            ]);
            $q = DB::table('permissions')->where('name','=','update-anfitrion-board')->get();
            DB::table('permission_user')->insert([
                'permission_id' => $q[0]->id,
                'user_id' => $user->id,
            ]);
        }catch (Exception $exception){
            return $exception;
        }
        return redirect()->route('frontoffice.dashboard.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Board  $board
     * @return \Illuminate\Http\Response
     */
    public function show(Board $board)
    {
        $this->authorize('view',$board);
        abort_unless($board->users->contains(auth()->id()), 403);
        return view('theme.frontoffice.pages.board.show',[
            'board' => $board
        ]);
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
                   'user_id'=>$user->id,
                    'board_id'=>$board_id
                ]);
                DB::table('role_user')->insert([
                    'role_id' => $role_id,
                    'user_id' => $user->id,
                    'board_id' => $board_id
                ]);
                if ($role_id == 3){
                    $q = DB::table('permissions')->where('name','=','view-colaborador-board')->get();
                    DB::table('permission_user')->insert([
                        'permission_id' => $q[0]->id,
                        'user_id' => $user->id,
                    ]);
                    $q = DB::table('permissions')->where('name','=','update-colaborador-board')->get();
                    DB::table('permission_user')->insert([
                        'permission_id' => $q[0]->id,
                        'user_id' => $user->id,
                    ]);
                }else{
                    $q = DB::table('permissions')->where('name','=','view-invitado-board')->get();
                    DB::table('permission_user')->insert([
                        'permission_id' => $q[0]->id,
                        'user_id' => $user->id,
                    ]);
                }

            }catch (Exception $exception){
                return $exception;
            }
        }
        return redirect()->route('frontoffice.dashboard.index');
    }
    public function board_with(User $user)
    {
        $user_a = auth()->user();
        $user_b = $user;
	    $board = $user_a->boards()->whereHas('user', function ($q) use ($user_b) {
        $q->where('board_user.user_id', $user_b->id);
    })->first();
	if(!$board)
    {
        $board = \App\Models\Board::create([]);
        $board->users()->sync([$user_a->id, $user_b->id]);
    }
        return redirect()->route('frontoffice.board.show', $board);
    }
    public function get_users(Board $board)
    {
        $users = $board->users;
        return response()->json([
            'user' => $users
        ]);
    }

    public function get_models(Board $board)
    {
        $models = $board->models()->with('user')->get();
        return response()->json([
            'models' => $models
        ]);
    }
    public function showUser(User $user){
        //$this->authorize('view', $user);
        return view('theme.frontoffice.pages.board.user.show',[
            'user'=>$user,
        ]);
    }
    public function assign_role(User $user){
        //$this->authorize('assign_role', $user);
        return view('theme.frontoffice.pages.board.user.assign_role',[
            'user'=>$user,
            'roles'=>Role::all()
        ]);
    }
    public function role_assignment(Request $request,User $user){
        //$this->authorize('assign_role', $user);
        $user->role_assignment($request);
        return redirect()->route('frontoffice.board.user.show',$user);

    }
    public function assign_permission(User $user){
        //$this->authorize('assign_permission', $user);
        return view('theme.frontoffice.pages.board.user.assign_permission',[
            'user' => $user,
            'roles' => $user->roles
        ]);
    }
    public function permission_assignment(Request $request, User $user){
        //$this->authorize('assign_permission', $user);
        $user->permissions()->sync($request->permissions);
        return redirect()->route('frontoffice.board.user.show',$user);
    }
}
