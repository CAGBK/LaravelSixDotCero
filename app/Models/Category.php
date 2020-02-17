<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = "categories";
    protected $fillable = ['name', 'description'];
    protected $guarded = ['id'];

    public function categories()
    {
        return $this->hasMany('App\Models\Challenge');
    } 
}
