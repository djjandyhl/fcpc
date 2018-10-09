<?php
/**
 * Created by PhpStorm.
 * User: djj
 * Date: 2018/10/2
 * Time: 22:17
 */

namespace App\Http\Middleware;

use Closure;
use Overtrue\Socialite\User;

class FakeWechatSession
{
    public function handle($request, Closure $next)
    {
        $user = new User([
            'id' => rand(10000000, 999999999999)
        ]);
        session(['wechat.oauth_user.default' => $user]);
        return $next($request);
    }
}