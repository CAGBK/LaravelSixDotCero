<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    protected $table = "subcategories";
    protected $fillable = ['name', 'description', 'question_id'];
    protected $guarded = ['id'];

    public function categories()
    {
        return $this->hasMany('App\Models\Category');
    } 
    public function questions()
    {
        return $this->belongsToMany('App\Models\Question');
    }
    public function subcategoryquestiondetail()
    {
        return $this->hasMany('App\Models\SubcategoryQuestionDetail');
    }
    
}
