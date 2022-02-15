<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LicenceCategory extends Model
{
    use HasFactory;

    /*public function getOneLicenceCategory(){
        return $this->belongsTo(LicenceCategory::class, '')
    }
    */

    public function getLicenceCategories(){
        return LicenceCategory::orderBy('category_name', 'ASC')->get();
    }
}
