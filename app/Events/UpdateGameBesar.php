<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class UpdateGameBesar implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     */
    public $numOfAttack, $health, $willAttack, $buff;
    public function __construct($numOfAttack, $health, $willAttack, $buff)
    {
//        $this->message = $message;
        $this->numOfAttack = $numOfAttack;
        $this->health = $health;
        $this->willAttack = $willAttack;
        $this->buff = $buff;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn(): array
    {
//        return [
//            new PrivateChannel('channel-name'),
//        ];

        return [
            new Channel('update-gamebesar'),
        ];
    }
}
