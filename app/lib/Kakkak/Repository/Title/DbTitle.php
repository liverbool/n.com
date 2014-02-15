<?php namespace Lib\Kakkak\Repository\Title;

use Carbon\Carbon;
use Lib\Services\Db\Writer;
use Intervention\Image\Image;
use Char, Actor, Title, Helpers, Event;
use Lib\Services\Images\ImageSaver as Imgs;
use Lib\Repository\Data\DataRepositoryInterface as Data;
use Lib\Repository\Review\ReviewRepositoryInterface as RevRepo;

class DbTitle extends \Lib\Repository\Title\DbTitle implements TitleRepositoryInterface
{
    /**
     * Title model instance.
     *
     * @var Title
     */
    private $title;

    /**
     * Writer instance.
     *
     * @var Lib\Services\Db\Writer
     */
    public $dbWriter;

    /**
     * Review model instance.
     *
     * @var Review
     */
    private $review;

    /**
     * ImagesHandler instance.
     *
     * @var Lib\Services\Handlers\ImagesHandler
     */
    private $images;

    /**
     * Data provider instance.
     *
     * @var Lib\Repository\Data\DataProviderInterface
     */
    public $provider;

    public function __construct(Title $title, Writer $dbWriter, Imgs $images, RevRepo $review, Data $provider)
    {
        $this->title    = $title;
        $this->dbWriter = $dbWriter;
        $this->images   = $images;
        $this->review   = $review;
        $this->provider = $provider;
    }

    public function latestsIndex()
    {
        return $this->title
            ->where('poster', '>', 0)
            ->where('fully_scraped', '=', 1)
            ->where('release_date', '<', Carbon::now()->toDateString())
            ->limit(12)
            ->orderBy(Helpers::getOrdering(), 'desc')
            ->get()
            ;
    }
}