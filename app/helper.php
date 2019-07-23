<?php
use App\Sitesetting;

function siteTitle(){
    return Sitesetting::find(1)->title;
}




?>