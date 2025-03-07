<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {
        if (!auth('company')->check() && $request->segment(1) == 'company') {
            return route('company.login');
        }
        if (!auth('admin')->check() && $request->segment(1) == 'admin') {
            return route('admin.login');
        }
        return $request->expectsJson() ? null : route('job_seeker.login');
    }
}
