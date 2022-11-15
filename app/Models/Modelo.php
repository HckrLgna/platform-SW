<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Modelo extends Model
{
    use HasFactory;
    protected $table ='models';
    protected $fillable = ['code', 'board_id','user_id'];

    //realaciones
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function board()
    {
        return $this->belongsTo('App\Models\Board');
    }
}
