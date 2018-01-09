<?php


namespace App\Http\Middleware;

use Closure;

class FrontendMiddleware
{
    public function handle($request, Closure $next)
    {
        $user = session('user');
        try {
            $userId = $user->id;
        } catch (\Exception $err) {
            $userId = null;
        }

        if ($userId) {
            $request->userId = $userId;
            return $next($request);
        } else {
            return redirect('/login');

            return response()->json([
                'msg' => '未登录',
            ], 403);
        }
    }
}