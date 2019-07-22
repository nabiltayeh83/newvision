<?php
use App\Sitesetting;

function siteTitle(){
    return Sitesetting::find(1)->title;
}

function siteDetails(){
    return Sitesetting::find(1)->details;
}

function siteKeywords(){
    return Sitesetting::find(1)->keywords;
}

function siteIco(){
    return Sitesetting::find(1)->siteico;
}


?>