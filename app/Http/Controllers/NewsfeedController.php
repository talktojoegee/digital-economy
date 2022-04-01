<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

class NewsfeedController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
        $this->section = new Department();

    }

    public function index(){
        return view('newsfeed.index',[
            'sections'=>$this->section->getAllDepartments()
        ]);
    }
}
