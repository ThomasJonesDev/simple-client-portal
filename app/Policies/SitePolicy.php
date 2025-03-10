<?php

namespace App\Policies;

use App\Models\Site;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class SitePolicy
{
    public function access(User $user, Site $site): bool
    {
        return $site->user()->is($user);
    }
}
