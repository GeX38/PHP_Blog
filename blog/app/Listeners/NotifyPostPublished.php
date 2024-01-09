<?php

namespace App\Listeners;

use App\Events\PublishPostEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log; 

class NotifyPostPublished implements ShouldQueue
{
    use InteractsWithQueue;

    /**
     * Handle the event.
     *
     * @param  \App\Events\PublishPostEvent  $event
     * @return void
     */
    public function handle(PublishPostEvent $event)
    {
        $post = $event->post;
        
        Log::info("Статья {$post->title} была опубликована!");
    }
}

