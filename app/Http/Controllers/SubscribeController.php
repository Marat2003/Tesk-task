<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserWebSite;
use App\Models\WebSite;
use Illuminate\Http\Request;

class SubscribeController extends Controller
{
    public function subscribe($email, $title)
    {
        $user = User::where("email", $email)->first();
        $website = WebSite::where("title", $title)->first();
        if(!$user || !$website) {
            return "Unvalid user email or website title";
        }
        $subscribed = UserWebSite::where("user_id", $user->id)->where("web_site_id", $website->id)->first();

        if ($user && $website && !$subscribed) {
            UserWebSite::create([
                "user_id" => $user->id,
                "web_site_id" => $website->id
            ]);
            return "The user subscribed successfully";
        } else {
            return "something is wrong";
        }

    }
}
