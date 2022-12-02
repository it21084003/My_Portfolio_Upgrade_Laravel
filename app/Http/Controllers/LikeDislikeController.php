<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LikesDislike;
use Auth;

class LikeDislikeController extends Controller
{
    public function like($postId){
        //important one time like
        $isExit = LikesDislike::where('post_id','=',$postId)->where('user_id','=',Auth::user()->id)->first();

        if($isExit){
            if($isExit->type == 'like'){
                return back();
            }else{
                LikesDislike::where('id',$isExit->id)->update([
                    'type' => 'like',
                ]);
                return back();
            }
            return back();
        }else{
            LikesDislike::create([
                'post_id' => $postId,
                'user_id' => Auth::user()->id,
                'type' => 'like',
            ]);
            return back();
        }

    }
    public function dislike($postId){
        $isExit = LikesDislike::where('post_id','=',$postId)->where('user_id','=',Auth::user()->id)->first();

        if($isExit){
            if($isExit->type == 'dislike'){
                return back();
            }else{
                LikesDislike::where('id',$isExit->id)->update([
                    'type' => 'dislike',
                ]);
                return back();
            }
            return back();
        }else{
            LikesDislike::create([
                'post_id' => $postId,
                'user_id' => Auth::user()->id,
                'type' => 'dislike',
            ]);
            return back();
        }
    }
}
