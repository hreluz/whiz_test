<?php

namespace App\Http\Middleware;
use Symfony\Component\HttpFoundation\HeaderBag;

use Closure;

class VerifyApiKey
{

    public function handle($request, Closure $next)
    {
         //Get the api key from the header or the content
        $api_key_send = !empty($request->headers->get('api-key')) ? $request->headers->get('api-key')  : $request->get('api-key');
        $api_key = env('API_KEY');

        if(empty(trim($api_key)) || $api_key_send != $api_key )
            return response()->json(['error' => 'unauthorized' ], 401);
        
        //Force all the answers will be in JSON
        $request->server->set('HTTP_ACCEPT', 'application/json');
        $request->headers = new HeaderBag($request->server->getHeaders());

        return $next($request);
    }
}
