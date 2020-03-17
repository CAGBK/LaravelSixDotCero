<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CQuestion extends Model
{
    protected $table = "cquestions";
    protected $fillable = ['name','color'];
    protected $guarded = ['id'];

    public function questions()
    {
        return $this->hasMany('App\Models\Question');
    }
    
}
