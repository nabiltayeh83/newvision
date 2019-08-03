<?php
use App\{
    Service,
    Category
    };

function servicesCount($category_id){
    return Service::where('category_id', $category_id)->where('is_active', 1)->count();
}


function categoryName($id){
    $title = Category::findOrFail($id);
     return $title->title;
}



?>