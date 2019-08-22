<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sitesetting extends Model
{
    protected $fillable = ['title', 'description', 'keywords', 'siteico', 'logo'];
}
