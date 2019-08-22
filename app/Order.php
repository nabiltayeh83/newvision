<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['companyname', 'fullname', 'email', 'phone', 'facebookaccount', 'twitteraccount', 
    'category_id', 'details'];


    public function categoryname(){
        return $this->belongsTo('App\Category', 'category_id');
    }


}
