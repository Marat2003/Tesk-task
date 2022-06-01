<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Jobs\PostAlertJob;
use App\Models\Post;
use App\Models\WebSite;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function addPost(Request $request)
    {

        $newpost = Post::create([
            'title' => $request->title,
            'description' => $request->description,
            'text' => $request->text,
            'web_site_id' => $request->web_site_id
        ]);

        $website = WebSite::where("id", $newpost->web_site_id)->with("users")->first();
        $subscribers = $website->users;


        if ($newpost) {
            foreach ($subscribers as $subscriber) {
                dispatch(new PostAlertJob($subscriber, $newpost));
            }
            return "Post added successfully";
        }
        return 'Failed';
    }
}
