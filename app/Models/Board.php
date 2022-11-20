<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Board extends Model
{
    use HasFactory;
    protected $fillable = ['name','link','path_img','description','role_id'];
    //relations
    public function users(){
        return $this->belongsToMany(User::class);
    }
    public function models()
    {
        return $this->hasMany('App\Models\Modelo');
    }
    public function roles(){
        return $this->belongsToMany('App\Models\Role');
    }
}
