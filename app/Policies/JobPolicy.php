<?php

namespace App\Policies;

use App\Models\Job;
use App\Models\User;
use Illuminate\Auth\Access\Response;
use PhpParser\Node\Expr\Cast\Bool_;

class JobPolicy
{
    public function edit(User $user, Job $job): Bool
    {
        return ($job->employer->user->is($user));
    }
}
