<?php

namespace App\Http\Controllers;

use App\Models\Publication;
use App\Models\PublicationCategory;
use Illuminate\Http\Request;

class PublicationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->publication = new Publication();
        $this->publicationcategory = new PublicationCategory();

    }

    public function managePublications(){
        return view('publication.index',['publications'=>$this->publication->getAllPublications()]);
    }

    public function managePublicationCategories(){
        return view('publication.categories', ['categories'=>$this->publicationcategory->getAllPublicationCategories()]);
    }

    public function storePublicationCategory(Request $request){
        $this->validate($request,[
            'category_name'=>'required|unique:publication_categories,category_name'
        ],[
            'category_name.required'=>'Enter publication category name',
            'category_name.unique'=>"There's an existing category with this name"
        ]);
        $this->publicationcategory->setNewCategory($request);
        session()->flash("success", "<strong>Success!</strong> Your category was saved.");
        return back();
    }

    public function updatePublicationCategory(Request $request){
        $this->validate($request,[
            'category_name'=>'required|unique:publication_categories,category_name',
            'category'=>'required'
        ],[
            'category_name.required'=>'Enter publication category name',
            'category_name.unique'=>"There's an existing category with this name"
        ]);
        $this->publicationcategory->updateCategory($request);
        session()->flash("success", "<strong>Success!</strong> Your changes were saved.");
        return back();
    }



}
