<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InitialCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $user = Auth::user();
        // 初期設定完了フラグをチェック
        if (!$user->is_initial_setting) {
            if (!strpos($request->path(), 'edit')) {
                $route = $user->user_type == '1' ? 'student.edit' : 'schedule.index';
                return redirect()->route($route, $user->id);
            }
        }
        return $next($request);
    }
}
