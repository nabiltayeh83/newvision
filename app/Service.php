<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = ['projectname', 'customername', 'category_id', 'stages', 'period', 'year', 'vedio', 
    'filetitle', 'fileattach', 'image', 'is_active'];
}
