<?php namespace Lib\Kakkak\Repository\Title;
 
use Illuminate\Support\ServiceProvider;
 
class TitleServiceProvider extends ServiceProvider {
 
    public function register()
    {
        $this->app->bind(
            'Lib\Kakkak\Repository\Title\TitleRepositoryInterface',
            'Lib\Kakkak\Repository\Title\DbTitle'
        );
    }
 
}