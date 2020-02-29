<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $table = "answers";
    protected $fillable = ['name', 'puntos', 'state_id'];
    protected $guarded = ['id'];

    public function qadetails()
    {
        return $this->hasMany('App\Models\QADetail');
    }
    public function questions()
    {
        return $this->belongsToMany('App\Models\Question');
    }
    public function state()
    {
        return $this->belongsTo('App\Models\State');
    }
}
