<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    protected $table = "subcategories";
    protected $fillable = ['name', 'description', 'question_id', 'subcategory_image', 'color_brand'];
    protected $guarded = ['id'];

    public function categories()
    {
        return $this->belongsTo('App\Models\Category');
    }
    public function questions()
    {
        return $this->hasMany('App\Models\Question');
    }   
}
