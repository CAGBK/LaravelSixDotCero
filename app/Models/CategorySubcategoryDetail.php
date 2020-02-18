<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategorySubcategoryDetail extends Model
{
    protected $table = "category_subcategory";
    protected $fillable = [ 'category_id','subcategory_id'];
    protected $guarded = ['id'];

    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }
    public function Subcategory()
    {
        return $this->belongsTo('App\Models\Subcategory');
    }
}
<<<<<<< HEAD


=======
>>>>>>> 1e0ee7e18fc57e7aa376f346a82965299cbf3f1c
