<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\DB;

class CheckTimesheet
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        $timesheetCount = DB::table('timesheets')->count();

        if ($timesheetCount === 0) {
            return response()->view('components.404', [
                'code' => 403,
                'message' => 'Access denied: Timesheet is empty.'],
                 403);
        }

        return $next($request);
    }
}
