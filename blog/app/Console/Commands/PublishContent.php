<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Post;

class PublishContent extends Command
{
    protected $signature = 'content:publish';
    protected $description = 'Automatically publish content based on scheduled time.';

    public function handle()
    {
        $currentTime = now();

        $posts = Post::where('published', false)
                     ->where('created_at', '<=', $currentTime)
                     ->get();

        foreach ($posts as $post) {
            $post->published = true;
            $post->save();
            $this->info("Post '{$post->title}' has been published.");
        }

        $this->info('Content publishing completed.');
    }
}
