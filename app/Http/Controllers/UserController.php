<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Skill;
use App\Models\Project;
use App\Models\StudentCount;
use App\Models\Category;
use App\Models\Post;
use App\Models\LikesDislike;
use Auth;
// use App\Models\{Skill,Project,StudentCount};

class UserController extends Controller
{
    public function index(){
        $skills = Skill::all();
        $projects = Project::all();
        $studentCount = StudentCount::find(1);

        // dd($projects);
       // return $skills;
        return view('user_panel.index',compact('skills','projects','studentCount'));
    }

    public function postsindex(){
        $categories = Category::all();
        $posts = Post::all();
        return view('user_panel.posts',compact('categories','posts'));
    }
    public function postsDetailsIndex($id){
        $post = Post::find($id);
        $likes = LikesDislike::where('post_id','=',$id)->where('type','=','like')->get();
        $dislikes = LikesDislike::where('post_id','=',$id)->where('type','=','dislike')->get();

        $likeStatus = LikesDislike::where('post_id','=',$id)->where('user_id','=',Auth::user()->id)->first();
        return view('user_panel.post_detail',compact('post','likes','dislikes','likeStatus'));
    }
}
