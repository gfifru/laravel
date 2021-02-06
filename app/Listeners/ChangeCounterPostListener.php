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
            // через кэш
            $ipUser = request()->ip();
            $key = 'views-' . $event->post->id . '-' . $ipUser;
            if (!cache()->has($key)) {
                cache()->put($key, 1, now()->addHours(24));
                $event->post->view_counter++;
                $event->post->save();
            }
        }
    }
}
