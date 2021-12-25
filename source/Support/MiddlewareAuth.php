<?php


namespace Source\Support;

use Pecee\Http\Request;

use Pecee\Http\Middleware\IMiddleware;
use Source\Models\Auth;

class MiddlewareAuth implements IMiddleware
{

    public function handle(Request $request): void
    {
        $request->user = Auth::auth();
        if ($request->user === null) {
            redirect(url('login'));
        }
    }
}
