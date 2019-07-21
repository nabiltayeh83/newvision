<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['companyname', 'fullname', 'email', 'phone', 'facebookaccount', 'twitteraccount', 
    'category_id', 'details'];
}
