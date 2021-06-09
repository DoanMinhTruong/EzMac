<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class MissingCategoryAdd
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(!$request['name'] || !$request['slug'])
            return redirect('/admin/category' )->with('status' , 'Missing Value. Please check it!!');
        return $next($request);
    }
}
