<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChallengeUser extends Model
{
    protected $table = "challenge_user";
    protected $fillable = ['user_id', 'challenge_id', 'score'];
    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
    public function users()
    {
        return $this->belongsToMany('App\Models\User');
    }
    public function state()
    {
        return $this->belongsTo('App\Models\State');
    }
}
