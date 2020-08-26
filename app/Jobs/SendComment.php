<?php

namespace App\Jobs;

use App\Comment;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SendComment implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $maxExceptions = 50;
    public $retryAfter = 10;
    protected $comment;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($comment)
    {
        $this->comment = $comment;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $comment = new Comment();

        $comment->article_id = $this->comment['id'];
        $comment->subject = $this->comment['subject'];
        $comment->body = $this->comment['body'];

        $comment->save();
    }
}
