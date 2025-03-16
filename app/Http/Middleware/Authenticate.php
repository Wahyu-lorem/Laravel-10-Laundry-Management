<?php

namespace App\Http\Middleware;

use Closure;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Middleware\Authenticate as Middleware;


class Authenticate extends Middleware
{

    protected function redirectTo(Request $request): ?string
    {
        return $request->expectsJson() ? null : route('login');
    }

    public function handle($request, Closure $next, ...$guards)
    {
        if (Auth::check()) {
            $formattedDateTime = Carbon::now()->format('Y-m-d H:i:s');
            DB::table('users')->where('id', Auth::id())->update(['last_accessed_at' => $formattedDateTime]);
        }

        return $next($request);
    }

}
