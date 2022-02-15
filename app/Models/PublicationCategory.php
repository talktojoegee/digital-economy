<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PublicationCategory extends Model
{
    use HasFactory;




    public function getAllPublicationCategories(){
        return PublicationCategory::orderBy('category_name', 'ASC')->get();
    }

    public function setNewCategory(Request $request){
        $category = new PublicationCategory();
        $category->category_name = $request->category_name ?? '' ;
        $category->slug = Str::slug($request->category_name).'-'.substr(sha1(time()),32,40);
        $category->save();
    }

    public function updateCategory(Request $request){
        $category =  PublicationCategory::find($request->category);
        $category->category_name = $request->category_name ?? '' ;
        $category->slug = Str::slug($request->category_name).'-'.substr(sha1(time()),32,40);
        $category->save();
    }
}
