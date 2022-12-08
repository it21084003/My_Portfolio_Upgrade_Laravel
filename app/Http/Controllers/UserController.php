<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Skill;
use App\Models\Project;
use App\Models\StudentCount;
use App\Models\Category;
use App\Models\Post;
use App\Models\LikesDislike;
use App\Models\Comment;
use Auth;
// use App\Models\{Skill,Project,StudentCount};

class UserController extends Controller
{
    public function index(){
        $skills = Skill::all();
        $projects = Project::all();
        $studentCount = StudentCount::find(1);
        $post = Post::latest()->take(6)->get();

        // dd($projects);
       // return $skills;
        return view('user_panel.index',compact('skills','projects','studentCount','post'));
    }

    public function search(Request $request){
        $categories = Category::all();
        $searchData = $request->search_data;
        //like ka nae nae tu nay yin
        $posts = Post::where('title','like','%'.$searchData.'%')
            ->orWhere('content','like','%'.$searchData.'%')//content nae search
            ->orWhereHas('category',function($category) use($searchData){
                $category->where('name','like','%'.$searchData.'%');
            })//categories nae search
            ->paginate(10);
        return view('user_panel.posts',compact('categories','posts'));
    }

    public function searchByCategory($catId){
        $categories = Category::all();
        $posts = Post::where('category_id','=',$catId)->paginate(10);
        return view('user_panel.posts',compact('categories','posts'));
    }

    public function postsindex(){
        $categories = Category::all();
        $posts = Post::latest()->paginate(10);
        return view('user_panel.posts',compact('categories','posts'));
    }
    public function postsDetailsIndex($id){
        if(!Auth::check()){
            return redirect()->route('login');
        }


        $post = Post::find($id);
        $likes = LikesDislike::where('post_id','=',$id)->where('type','=','like')->get();
        $dislikes = LikesDislike::where('post_id','=',$id)->where('type','=','dislike')->get();
        $comment = Comment::where('post_id',$id)->where('status','show')->get();

        $likeStatus = LikesDislike::where('post_id','=',$id)->where('user_id','=',Auth::user()->id)->first();
        return view('user_panel.post_detail',compact('post','likes','dislikes','likeStatus','comment'));
    }
}
