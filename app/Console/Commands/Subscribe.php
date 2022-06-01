<?php

namespace App\Console\Commands;

use App\Models\User;
use App\Models\UserWebSite;
use App\Models\WebSite;
use Illuminate\Console\Command;

class Subscribe extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:subscribe {email?} {title?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Subscribe command';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $user = User::where("email", $this->argument("email"))->first();
        $website = WebSite::where("title", $this->argument("title"))->first();
        if(!$user || !$website) {
            return $this->error("Invalid user email or website title");
        }
        $subscribed = UserWebSite::where("user_id",$user->id)->where("web_site_id",$website->id)->first();

        if ($user && $website && !$subscribed) {
            UserWebSite::create([
                "user_id" => $user->id,
                "web_site_id" => $website->id
            ]);
             $this->info( "The user subscribed successfully");
        } else {
             $this->warn("The user is already subscribed");
        }
    }
}
