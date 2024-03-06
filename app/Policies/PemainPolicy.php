<?php

namespace App\Policies;

use App\Models\Contest;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class PemainPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }

    public function access(User $user, Contest $contest)
    {
        $isFullfied = count($contest->teams()->where('team_id', $user->team->id)->get());
        return $isFullfied == 1;
    }
}
