<?php

class Helpers extends Lib\Helpers
{
    public static function url($resource, $id, $controller = 'movies', $slug = true)
    {
        if ($controller == 'movie') {
            $controller = 'movies';
        }

        $opt = App::make('Options');

        //get uri separator
        $s = $opt->getUriSeparator();

        //get uri case
        $case = $opt->getUriCase();

        //remove all non alpha numeric characters and replace all spaces
        //and double spaces with uri separator
        $resource = preg_replace('~[^\p{L}\p{N} ]++~u', '', $resource);
        $resource = str_replace('  ', $s, trim($resource));
        $resource = str_replace(' ', $s, trim($resource));

        $controller = $slug ? Str::slug(trans("main.$controller")) : $controller;

        if ($case && $case == 'lowercase') {
            return url(strtolower($controller . '/' . $id . $s . $resource));
        }

        return url($controller . '/' . $id . $s . Str::slug($resource));
    }

    public static function profileUrl($user = null)
    {
        $user = $user ? : self::loggedInUser();

        return self::url($user->username, $user->id, 'users', false);
    }
}