<?php

use carbon\Carbon;

class News extends Eloquent
{
	/**
     * Cacher instance.
     * 
     * @var Lib\Services\Cache\Cacher
     */
    private $cache;

    public function __construct()
    {
        $this->cache = App::make('Lib\Services\Cache\Cacher');
    }


    /**
     * Returns 8 latest news items.
     * 
     * @param  Illuminate\Database\Eloquent\Builder $query 
     * @return collection
     */
    public function scopeNews($query)
    {
        $news = $query->limit(11)->orderBy('created_at', 'desc')->get();

        $options = App::make('Options');
        if ($options->getDataProvider() == 'db')
        {
            return $news;
        }

        //check if it has been a day since last news update,
        //if so then update news now
        if ($news->isEmpty() || $news->first()->created_at->addHours(8) <= Carbon::now())
        {
            $news = $this->updateNews();
        }

        return $news;
    }

    /**
     * Returns all news items paginated.
     * 
     * @param  Illuminate\Database\Eloquent\Builder $query 
     * @return collection
     */
    public function scopeNewsIndex($query)
    {
        return $query->orderBy('created_at', 'desc')->paginate(20);
    }

    /**
     * Fetches 1 latest news item.
     * 
     * @param  $query
     * @return News
     */
    public function scopeLastUpdated($query)
    {
        return $query->orderBy('created_at', 'DESC')->limit(1)->get();
    }

    /**
     * Updates news from external sources.
     * 
     * @return Collection
     */
    public function updateNews()
    {
        $s = App::make('Lib\Services\Scraping\Scraper');
        $s->updateNews();

        $news = $this->limit(11)->orderBy('created_at', 'desc')->get();

        $this->cache->put('news', md5('news'), $news);

        return $news;
    }
}