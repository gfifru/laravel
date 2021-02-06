<?php

namespace App\Events;

use App\Models\NewsPost;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class PostViewCounter
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $post;

    /**
     * PostViewCounter constructor.
     * @param $post
     */
    public function __construct(NewsPost $post)
    {
        $this->post = $post;
    }


    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
