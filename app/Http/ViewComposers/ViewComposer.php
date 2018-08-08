<?php
namespace App\Http\ViewComposers;

use App\Repositories\Pages\HomeRepository;
use Illuminate\View\View;

class ViewComposer
{
    public $home;

    /**
     * Create a movie composer.
     *
     * @return void
     */
    public function __construct(HomeRepository $homeRepository)
    {
        $this->home = $homeRepository; //lay du lieu
    }

    /**
     * Bind data to the view.
     *
     * @param  View $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('home', ($this->home));
    }
}
