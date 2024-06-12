<?php

namespace App\Policies;

use App\Models\Job;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class JobPolicy
{
    // A policy behaves a lot like a gate
    public function edit(User $user, Job $job): bool
    {
        return $job->employer->user->is($user);
    }

}
