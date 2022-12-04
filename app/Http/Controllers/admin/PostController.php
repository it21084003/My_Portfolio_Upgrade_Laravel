<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\Comment;

//for update image
use Illuminate\Support\Facades\File;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        return view('admin_panel.post.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin_panel.post.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required',
            'image' => 'required|image',
            'title' => 'required',
            'content' => 'required',
        ]);
        //image upload method
        $image = $request->image;
        $imageName = uniqid().'_'. $image->getClientOriginalName();

        $image->storeAs('public/post-images',$imageName);

        Post::create([
            'category_id' => $request->category_id,
            //notice image name
            'image' => $imageName,
            'title' => $request->title,
            'content' => $request->content,
        ]);
        return redirect()->route('posts.index')->with('successMsg','You have successfully Created');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $comments = Comment::where('post_id',$id)->get();
        return view('admin_panel.post.comment',compact('comments'));
    }

    public function showHideComment($id){
        $comment = Comment::findOrFail($id);
        if($comment->status == 'show'){
            $comment->update([
                'status' => 'hide',
            ]);
        }else{
            $comment->update([
                'status' => 'show',
            ]);
        }
        return back()->with('successMsg','Comment status changed successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::all();
        $post = Post::find($id);
        return view('admin_panel.post.edit',compact('categories','post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'category_id' => 'required',
            'image' => 'nullable|image',
            'title' => 'required',
            'content' => 'required',
        ]);
        $post = Post::find($id);

        if($request->hasFile('image')){
            //image update
            //delete old image
            $postImage = $post->image;
            File::delete('storage/post-images/'.$postImage);

            //image upload method
            $image = $request->image;
            $imageName = uniqid().'_'. $image->getClientOriginalName();

            $image->storeAs('public/post-images',$imageName);

            $post->update([
                'category_id' => $request->category_id,
                'image' => $imageName,
                'title' => $request->title,
                'content' => $request->content,
            ]);
        }else{
            $post->update([
                'category_id' => $request->category_id,
                'title' => $request->title,
                'content' => $request->content,
            ]);
        }

        return redirect()->route('posts.index')->with('successMsg','You have successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);

         //delete old image
         $postImage = $post->image;
         File::delete('storage/post-images/'.$postImage);
         $post->delete();
         return back()->with('successMsg','You have successfully Deleted');

        }
}
