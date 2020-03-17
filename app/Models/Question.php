<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $table = "questions";
    protected $fillable = ['question_name', 'state_id', 'asnwer_id'];
    protected $guarded = ['id'];

    public function qadetails()
    {
        return $this->hasMany('App\Models\QADetail');
    }  
    public function state()
    {
        return $this->belongsTo('App\Models\State');
    }
    public function subcategories()
    {
        return $this->belongsTo('App\Models\Subcategory');
    }
    public function answers()
    {
        return $this->belongsToMany('App\Models\Answer');
    }
    public function cquestion()
    {
        return $this->belongsTo('App\Models\CQuestion');
    }
}
