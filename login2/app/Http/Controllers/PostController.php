<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function getdashboard()
    {
        $posts = Post::orderBy('created_at','desc')->get();
        return view('dashboard',['posts'=>$posts]);
    }
    public  function postCreatePost(Request $request)
    {
        $this->validate($request,[
            'body'=>'required|max:1000'
        ]);
        $post = new Post();
        $post->body = $request['body'];
        $msj = 'there was an error';
        if($request->user()->posts()->save($post))
        {
            $msj = 'Post successfully created!';
        }
        return redirect()->route('dashboard')->with(['message'=>$msj]);
    }
    public function getDeletePost($post_id)
    {
        $post = Post::where('id',$post_id)->first();
        if (Auth::user() != $post->user)
        {
            return redirect()->back();
        }
        $post->delete();
        return redirect()->route('dashboard')->with(['message'=> 'Successfully deleted!']);
    }

    public function getedit()
    {

    }
}
