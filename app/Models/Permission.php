<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Permission extends Model
{
    use HasFactory;


    public function getPermissions(){
        return Permission::orderBy('name', 'ASC')->get();
    }

    public function updatePermission(Request $request){
        $permission = Permission::where('permission', $request->permission)->first();
        $permission->name = $request->name;
        $permission->guard = "web";
        $permission->save();
        return $permission;
    }
}
