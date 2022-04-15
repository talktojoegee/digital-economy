<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Department;
use App\Models\FrequencyAssignment;
use Illuminate\Http\Request;

class NewsfeedController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
        $this->section = new Department();
        $this->company = new Company();
        $this->frequencyassignment = new FrequencyAssignment();


    }

    public function index(){
        return view('newsfeed.index',[
            'sections'=>$this->section->getAllDepartments(),
            'companies'=>$this->company->getAllCompanies(),
            'frequencies'=>$this->frequencyassignment->getAllCompanyFrequencies()
        ]);
    }
}
