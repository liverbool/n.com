<?php namespace Lib\Kakkak\Routing;

use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Routing\Matching\ValidatorInterface;

class UriValidator implements ValidatorInterface
{
    /**
     * Validate a given rule against a route and request.
     *
     * @param  \Illuminate\Routing\Route $route
     * @param  \Illuminate\Http\Request  $request
     *
     * @return bool
     */
    public function matches(Route $route, Request $request)
    {
        $path  = urldecode($request->path() == '/' ? '/' : '/' . $request->path());
        $regex = $route->getCompiled()->getRegex() . 'i';

        return preg_match($regex, $path);
    }
}