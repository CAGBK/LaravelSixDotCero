<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Challenge extends Model
{
    protected $table = "challenges";
    protected $fillable = ['nombre', 'categorias', 'subcategorias', 'fecha_inicio', 'fecha_fin', 'estado','user_id'];
    protected $guarded = ['id'];

    public function categories()
    {
        return $this->hasMany('App\Models\Category');
    }
    public function users()
    {
        return $this->belongsToMany('App\Models\User');
    }
    public function state()
    {
        return $this->belongsTo('App\Models\State');
    }

}
