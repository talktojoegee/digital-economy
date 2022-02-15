<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class State extends Model
{
    use HasFactory;

    /*
     * Use-case
     */
    public function getAllStates(){
        return State::orderBy('state_name', 'ASC')->get();
    }

    public function updateState(Request $request){
        $state = State::find($request->state);
        $state->state_name = $request->state_name;
        $state->save();
    }
}
