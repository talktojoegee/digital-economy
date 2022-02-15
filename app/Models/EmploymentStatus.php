<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmploymentStatus extends Model
{
    use HasFactory;


    /*
     * Use-case
     */
    public function getAllEmploymentStatuses(){
        return EmploymentStatus::orderBy('status', 'ASC')->get();
    }
}
