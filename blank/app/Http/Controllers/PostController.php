<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Post;
use App\Comment;
use App\User;
use App\Friendship;
use Carbon\Carbon;

class PostController extends Controller
{
    //middleware user authorisation
    public function __construct() 
    {
     $this->middleware('auth', ['except'=> ['index', 'show', 'search', 'homepage', 'friends_list']]);
    }
    
    // post mainpage
    public function index()
    {
        $user = Auth::user();
        $posts = Post::orderBy('updated_at','desc')->get();
        return view('posts.index')->with('posts', $posts)->with('user',$user);
    }


    public function create()
    {
        //
    }

    //Create new post
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|max:255',
            'message' => 'required|max:255',
        ]);
                
        $user_id = Auth::id();
        $post = new Post();
        $post->post_user_id = $user_id;
        $post->title = $request->title;
        $post->message = $request->message;
        $post->privacy = $request->privacy;
        $post->save();
        return redirect("/post/$post->id");
    }

    // show comments page
    public function show($id)
    {
        $user_id = Auth::id();
        $post = Post::find($id);
        $comments = Comment::where('post_id', '=', $id)->orderby('id','desc')->paginate(6);
        $friends = Friendship::where('auth_user_id', '=', Auth::id())->where('other_user_id', '=', $post->post_user_id)->get();
        return view('posts.show')->with('post', $post)->with('user_id', $user_id)->with('comments',$comments)->with('friends',$friends);
    }
    
    // redirect to edit form
    public function edit($id)
    {
        $post = Post::find($id);
        return view('posts.edit_form')->with('post', $post);
    }

    // edit post using edit form
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required|max:255',
            'message' => 'required|max:255',
        ]);

        $post = Post::find($id);
        $post->post_user_id = $request->post_user_id;
        $post->title = $request->title;
        $post->message = $request->message;
        $post->privacy = $request->privacy;
        $post->save();
        return redirect("/post/$post->id");
    }

    //delete post with comments
    public function destroy($id)
    {
        $comment = Comment::where('post_id', '=', $id);
        $comment->delete();
        $post = Post::find($id);
        $post->delete();
        return redirect('/post');
    }
    
    // create comment
    public function new_comment(Request $request, $id)
    {
        $this->validate($request, [
            'message' => 'required|max:255',
        ]);
        
        $user_id = Auth::id();
        $comment = new Comment();
        $comment->user_id = $user_id;
        $comment->post_id = $id;
        $comment->message = $request->message;
        $comment->save();
        return redirect("/post/$comment->post_id");
    }
    
    // delete comment
    public function delete_comment($post_id,$id)
    {
        $comment = Comment::find($id);
        $comment->delete();
        return redirect("/post/$comment->post_id");
    }
        
    //user profile page
    public function homepage($id)
    {
        $user = User::find($id);
        $time = Carbon::now();
        // $birth_date = date('Y-m-d', strtotime($user->birthday));
        $birth_date = new Carbon($user->birthday);
        // $time2 = $time->format('Y-m-d');
        $age = $birth_date->diff($time);
        $friends = Friendship::where('auth_user_id', '=', Auth::id())->where('other_user_id', '=', $id)->get();
        $posts = Post::where('post_user_id', '=', $id)->orderby('updated_at','desc')->get();
        return view('posts.homepage')->with('user', $user)->with('posts',$posts)->with('friends', $friends)->with('age', $age);
    }
    
    // adding friend
    public function add_friend(Request $request)
    {
    //one sided friendship
    $friendship = new Friendship();
    $friendship->auth_user_id = $request->auth_user_id;
    $friendship->other_user_id = $request->other_user_id;
    $friendship->save();
    
    //both sided friendship

    $friendship1 = new Friendship();
    $friendship1->auth_user_id = $request->other_user_id;
    $friendship1->other_user_id = $request->auth_user_id;
    $friendship1->save();

    return redirect("/post/profile/$friendship->other_user_id");
    }
    
    // remove friend
    public function remove_friend($id)
    {
        $friend = Friendship::where('auth_user_id', '=', Auth::id())->where('other_user_id', '=', $id);
        $friend->delete();
        $friend2 = Friendship::where('auth_user_id', '=', $id)->where('other_user_id', '=', Auth::id());
        $friend2->delete();
        return redirect("/post/profile/$id");
    }
    
    // friend's list
    public function friends_list($id)
    {
        $user = User::find($id);
        $friends = Friendship::where('auth_user_id', '=', $id)->get();
        return view('posts.friendslist')->with('user', $user)->with('friends', $friends);
    }
    
    // search function
    public function search(Request $request)
    {
        $this->validate($request, [
            'search' => 'required',
        ]);
        
        $name = $request->search;
        $results = User::where('name', 'LIKE', "%".$name."%")->get();
        return view('posts.results')->with('results', $results);
    }
    
}
