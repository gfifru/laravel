<?php

namespace App\Listeners;

use App\Models\NewsPost;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class ChangeCounterPostListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param object $event
     * @return void
     */
    public function handle($event)
    {
        if (isset($event->post) && $event->post instanceof NewsPost) {
            $event->post->view_counter++;
            $event->post->save();
        }
    }
}
