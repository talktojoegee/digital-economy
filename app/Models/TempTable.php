<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TempTable extends Model
{
    use HasFactory;

    public static function addRecord($email, $slug, $status){
        $temp = new TempTable();
        $temp->status = $status;
        $temp->slug = $slug;
        $temp->email = $email;
        $temp->save();
    }
}
