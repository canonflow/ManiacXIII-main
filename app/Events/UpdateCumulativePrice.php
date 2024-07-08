<?php

namespace App\Events;

use App\Enums\BackpackEnum;
use App\Enums\RestoreEnum;
use App\Models\Player;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class UpdateCumulativePrice implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     */
    public $userId;
    public $backpackPrice;  // int
    public $backpackAvailable;  // boolean
    public $restorePrice;  //  int
    public function __construct(Player $player, $userId)
    {
        $this->userId = $userId;
        $backpackAvailable = $player->backpack()->get()->isEmpty() ? 0 : $player->backpack->count;
        $this->backpackPrice = BackpackEnum::PRICE->value + ($backpackAvailable * BackpackEnum::PRICE->value);
        $this->backpackAvailable = $backpackAvailable < 5;
        $this->restorePrice = RestoreEnum::DEFAULT_PRICE->value + ($player->restore * RestoreEnum::CUMULATIVE_PRICE->value);
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn(): array
    {
        return [
            new PrivateChannel('private-update-price.' . $this->userId),
        ];
    }
}
