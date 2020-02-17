<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategorySubcategoryDetail extends Model
{
    protected $table = "subcategory_question";
    protected $fillable = [ 'category_id','subcategory_id'];
    protected $guarded = ['id'];

    public function category()
    {
        return $this->belongsTo('Grunenthal\Models\Category');
    }
    public function Subcategory()
    {
        return $this->belongsTo('Grunenthal\Models\Subcategory');
    }
}
