<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    protected $table = "states";
    protected $fillable = ['state'];
    protected $guarded = ['id'];


    public function users()
    {
        return $this->hasMany('App\Models\User');
    }
    
    public function challenges()
    {
        return $this->hasMany('App\Models\Challenge');
    }
    public function questions()
    {
        return $this->hasMany('App\Models\Question');
    }
    public function answers()
    {
        return $this->hasMany('App\Models\Answer');
    }
    public function challege_detail()
    {
        return $this->hasMany('App\Models\ChallengeDetail');
    }
}
