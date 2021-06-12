<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class MissingProductAdd
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
        if(!$request['name'] || !$request['slug'] || !$request['parent_id']|| !$request['price'] || !$request['image'])
            return redirect('/admin/product' )->with('status' , 'Missing Value. Please check it!!');
        return $next($request);
    }
}
