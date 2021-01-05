<?php

namespace App\Http\Middleware;
use Closure;
use App\Models\Generalsetting;

class HTTPSConnection {

    public function handle($request, Closure $next)

    {
        $gs = Generalsetting::find(1);

            if($gs->is_secure == 1) {
                if (!$request->secure()) {

                    return redirect()->secure($request->getRequestUri());
                }
            }


            return $next($request);

    }

}



?>