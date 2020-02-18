<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubcategoryQuestionDetail extends Model
{
    protected $table = "subcategory_question";
    protected $fillable = ['subcategory_id', 'question_id'];
    protected $guarded = ['id'];

    public function category()
    {
        return $this->belongsTo('Grunenthal\Models\Category');
    }
    public function question()
    {
        return $this->belongsTo('Grunenthal\Models\Question');
    }
}
