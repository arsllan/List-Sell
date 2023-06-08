<?php
use App\Models\Listing;
use App\Models\BodyTypes;
use App\Models\Categories;
use App\Models\Brands;
use App\Models\MarqueeNews;
use Str;
function compare_car_data(){
    $comparecar_data = session()->get('comparecars');
    if(session()->has('comparecars')){
         $comparecar_values = [];
         foreach($comparecar_data as $compare => $value){
             array_push($comparecar_values,$value);
         }
         $listings = Listing::with('model','model_sub','equipment','body_type')->whereIn('id',$comparecar_values)->get();
         return $listings;
    }else{
        return [];
    }
} 
function system_categories_data(){
    $categories = Categories::with('listing')->orderBy('created_at','asc')->get();
    return $categories;
} 

if(!function_exists('bodytypehelper')){
    function bodytypehelper(){
        $bodytypes = BodyTypes::orderBy('name','asc')->get();
        return $bodytypes;
    }  
}
if(!function_exists('states')){
    function states(){
        $states = DB::table('states')->get();
        return $states;
    }  
}
if(!function_exists('cities')){
    function cities(){
        $cities = DB::table('cities')->get();
        return $cities;
    }  
}
if(!function_exists('brands')){
    function brands(){
        $brands = Brands::orderBy('name','asc')->get();
        return $brands;
    }  
}
if(!function_exists('marqueenews')){
    function marqueenews(){
        $marqueenews = MarqueeNews::get();
        return $marqueenews;
    }  
}
if(!function_exists('slugmaking')){
    function slugmaking($id){
        $listingdata = Listing::where('id',$id)->first();
        $slug = Str::slug($listingdata->title, "-");
        return $slug;
    }  
}
