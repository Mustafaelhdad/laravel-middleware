<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Notifications\CreatePost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $post = Post::create([
            "title"=>$request->title,
            "body"=>$request->body
        ]);

        $users = User::where('id', '!=', auth()->user()->id)->get();
        $post_owner = auth()->user()->name;

        Notification::send($users, new CreatePost($post->id, $post_owner, $post->title));

        return redirect()->route('dashboard');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $post = Post::findorFail($id);
        $getID = DB::table('notifications')->where('data->post_id', $id)->pluck('id');
        DB::table('notifications')->where('id', $getID)->update(['read_at'=>now()]);

        return $post;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
    }

    public function markAsRead() {
        $user = User::find(auth()->user()->id);

        foreach ($user->unreadNotifications as $notification) {
            // $notification->markAsRead();
            $notification->delete();
        }

        return redirect()->back();
    }
}
