<?php

namespace App\Http\Controllers;

use App\Events\ModelSent;
use App\Models\Modelo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ModelController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function sent(Request $request)
    {
        $board_id = $request->board_id;
        $model_id = DB::table('models')
            ->where('board_id','=',$board_id)
            ->latest()
            ->first();
        if (!$model_id){
            $model = auth()->user()->models()->create([
                'code' => $request->code,
                'board_id' => $request->board_id,
            ])->load('user');
        }else{
            $model_id= $model_id->id;
            $model = Modelo::find($model_id);
            $model->code = $request->code;
            $model->user_id = auth()->user()->id;
            $model->save();
        }
        broadcast(new ModelSent($model))->toOthers();
        return $model;
    }
    public function myupdate(Request $request,$id_model){
        $board_id = $request->board_id;
        $model_id = DB::table('models')
                    ->where('board_id','=',$board_id)
                    ->latest()
                    ->first();
        $model_id= $model_id->id;
        $model = Modelo::find($model_id);
        $model->code = $request->code;
        $model->save()->load('user');
           broadcast(new ModelSent($model))->toOthers();
        return $model;
    }
}
