<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Helpers\RegexHelper;
class EnsurePageIsSuperiorToZero
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
        $currentPage = $request->query("page");
        if((int)$currentPage == 0 || RegexHelper::isAnUnsignedInteger($currentPage) == false){
            return redirect()->route("getAllBook", ["page" => 1]);
        }
        return $next($request);
    }
}
