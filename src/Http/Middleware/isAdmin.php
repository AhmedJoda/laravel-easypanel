<?php

namespace EasyPanel\Http\Middleware;

use EasyPanel\Support\Contract\AuthFacade;
use Closure;

class isAdmin
{

    public function handle($request, Closure $next)
    {
        if(auth()->user() and AuthFacade::checkIsAdmin(auth()->user()->id)){
            return $next($request);
        }
        
        return redirect(config('easy_panel.redirect_unauthorized'));
    }

}
