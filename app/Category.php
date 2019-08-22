<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['title', 'description', 'image', 'is_active'];


    public function services(){
        return $this->hasMany('App\Service')->where('is_active', 1)->latest();
    }

}
