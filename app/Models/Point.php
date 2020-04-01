<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Point extends Model
{
    protected $table = "challenge_user";
    protected $fillable = ['user_id', 'challenge_id'];
    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
    public function challenge()
    {
        return $this->belongsTo('App\Models\Challenge');
    }
}