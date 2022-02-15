<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MaritalStatus extends Model
{
    use HasFactory;


    /*
     * Use-case
     */
    public function getAllMaritalStatuses(){
        return MaritalStatus::orderBy('name', 'ASC')->get();
    }
}
