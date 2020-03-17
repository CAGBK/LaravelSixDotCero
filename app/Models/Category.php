<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = "categories";
    protected $fillable = ['name', 'description', 'user'];
    protected $guarded = ['id'];

    
    public function categories()
    {
        return $this->hasMany('App\Models\Challenge');
    } 
    public function categorysubcategory()
    {
        return $this->hasMany('App\Models\CategorySubcategoryDetail');
    }
    public function subcategories()
    {
        return $this->belongsToMany('App\Models\Subcategory');
    }
    
}
