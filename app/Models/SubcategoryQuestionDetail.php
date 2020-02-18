<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubcategoryQuestionDetail extends Model
{
    protected $table = "question_subcategory";
    protected $fillable = ['subcategory_id', 'question_id'];
    protected $guarded = ['id'];

    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }
    public function question()
    {
        return $this->belongsTo('App\Models\Question');
    }
}
