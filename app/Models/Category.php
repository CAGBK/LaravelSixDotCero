<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = "categories";
    protected $fillable = ['name', 'description', 'user', 'subcategory'];
    protected $guarded = ['id'];

    
    public function users()
    {
        return $this->hasMany('App\Models\User');
    } 
    public function subcategories()
    {
        return $this->belongsToMany('App\Models\Subcategory');
    }
    public function challenge()
    {
        return $this->belongsTo('App\Models\Challenge');
    }
}
