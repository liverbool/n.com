<?php namespace KK\Controller;

use Lib\Services\Mail\Mailer;
use Lib\Services\Validation\ContactValidator;

class Home extends \HomeController
{
    protected $options;

    public function __construct(ContactValidator $validator, Mailer $mailer)
    {
        parent::__construct($validator, $mailer);
        $this->options = \App::make('Options');
    }

    public function index()
    {
        $titleRepo = \App::make('Lib\Kakkak\Repository\Title\TitleRepositoryInterface');

        $view     = ucfirst($this->options->getHomeView());
        $featured = \Title::featured();
        $playing  = \Title::nowPlaying();
        $upcoming = \Title::upcoming();
        $news     = \News::news();
        $actors   = \Actor::popular();
        $latests = $titleRepo->latestsIndex();

        return \View::make("Main.Themes.$view.Home")
            ->withFeatured($featured)
            ->withPlaying($playing)
            ->withBg($this->options->getBg('home'))
            ->withFacebook($this->options->getFb())
            ->withUpcoming($upcoming)
            ->withActors($actors)
            ->withNews($news)
            ->withLatests($latests);
    }
}