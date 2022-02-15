<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class Publication extends Model
{
    use HasFactory;


    public function getAuthor(){
        return $this->belongsTo(User::class, 'author_id');
    }



    public function getAllPaginatedPublications(){
        return Publication::orderBy('id', 'DESC')->paginate(10)->get();
    }


    public function getAllPublications(){
        return Publication::orderBy('id', 'DESC')->get();
    }



    public function setNewPublication(Request $request){
        $filename = $this->uploadFeaturedImage($request) ?? '';

        $publication = new Publication();
        $publication->post_title = $request->post_title ?? '' ;
        $publication->post_content = $request->post_content ?? '';
        $publication->slug = Str::slug($request->post_title).'-'.substr(sha1(time()),32,40);
        $publication->can_comment = $request->can_comment ?? 1 ;
        $publication->featured_image = $filename;
        $publication->save();
        return $publication;
    }

    public function uploadFeaturedImage($request){
            if ($request->hasFile('featured_image')) {
                $extension = $request->featured_image->getClientOriginalExtension();
                $filename = Str::slug($request->post_title) . '_' . time() . '_' . '.' . $extension;
                $dir = 'assets/drive/';
                $request->featured_image->move(public_path($dir), $filename);
                return $filename;
            }
    }
}
