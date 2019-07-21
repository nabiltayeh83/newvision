<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $fillable = ['title', 'details', 'image', 'filetitle', 'fileattach'];
}
