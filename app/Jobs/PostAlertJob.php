<?php

namespace App\Jobs;

use App\Mail\PostAlertMail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class PostAlertJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $subscriber;
    public $post;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($subscriber, $post)
    {
        $this->subscriber = $subscriber;
        $this->post = $post;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $email = new PostAlertMail($this->post);
        Mail::to($this->subscriber['email'])->send($email);
    }
}
