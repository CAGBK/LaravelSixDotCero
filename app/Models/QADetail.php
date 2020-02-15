<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QADetail extends Model
{
    protected $table = "answer_question";
    protected $fillable = ['question_id', 'answer_id'];
    protected $guarded = ['id'];

    public function answer()
    {
        return $this->belongsTo('App\Models\Answer');
    }
    public function question()
    {
        return $this->belongsTo('App\Models\Question');
    }
}
