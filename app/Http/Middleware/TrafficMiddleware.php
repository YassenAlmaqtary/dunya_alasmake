<?php

namespace App\Http\Middleware;

use App\Models\Traffic;
use Closure;
use Exception;
use Illuminate\Http\Request;

class TrafficMiddleware
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
       try{
        
        $visitor = $request->ip();
        $traffic = Traffic::firstOrCreate(['visitor' => $visitor]);
        $traffic->save();
        
       }
       catch(Exception $exp){
          
       }

        
    
       

        return $next($request);
    }
}
