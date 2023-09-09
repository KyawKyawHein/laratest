<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\File;
use Spatie\YamlFrontMatter\YamlFrontMatter;

class Blog extends Model
{
    use HasFactory;
    protected $with = ["category","author"];

    public function scopeFilter($query,$filter){
        $query->when($filter['search']??false,function($query,$search){
            $query->where(function($query) use ($search){
                $query->where("title","LIKE","%".$search."%")
                  ->orWhere("body","LIKE","%".$search."%");
            });
        });

        $query->when($filter['category']??false,function($query,$slug){
            $query->whereHas("category",function($query) use ($slug){
                $query->where('slug',$slug);
            });
        });

        $query->when($filter['author']??false,function($query,$username){
            $query->whereHas("author",function($query) use ($username){
                $query->where("username",$username);
            });
        });
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function author(){ //author_id ma shi user() htae ma user_id u mr
        return $this->belongsTo(User::class,"user_id");
    }

    public function comments(){
        return $this->hasMany(Comment::class);
    }

    public function subscribers(){
        return $this->belongsToMany(User::class);
    }

    public function subscribe(){
        $this->subscribers()->attach(auth()->id());
    }

    public function unSubscribe(){
         $this->subscribers()->detach(auth()->id());
    }


    // public function __construct($title,$slug,$intro,$body){
    //     $this->title = $title;
    //     $this->slug = $slug;
    //     $this->intro = $intro;
    //     $this->body = $body;
    // }

    // public static function alll(){
    //     $files=File::files(resource_path("files")); 
    //     return collect($files)->map(function($file){
    //         $obj = YamlFrontMatter::parseFile($file);
    //         return new Blog($obj->title,$obj->slug,$obj->intro,$obj->body());
    //     });
    // }

    // public static function find($slug){
    //     // $path = resource_path("files/$slug.html");
    //     // if(!file_exists($path)){
    //     //     abort(404);
    //     // };
    //     // $obj = YamlFrontMatter::parseFile($path);
    //     // return cache()->remember("blogs.$slug",now()->addMinutes(2),function() use ($path,$obj){
    //     //     // return file_get_contents($path);        
    //     //     return new Blog($obj->title,$obj->slug,$obj->intro,$obj->body());
    //     // });
    //     $blogs = static::alll();
    //     return $blogs->firstWhere('slug',$slug);
    // }

    // public static function findOrFail($slug){
    //     $blog = static::find($slug);
    //     if(!$blog){
    //         throw new ModelNotFoundException();
    //     }
    //     return $blog;
    // }
}
