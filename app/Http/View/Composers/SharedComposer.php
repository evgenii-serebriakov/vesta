<?php

namespace App\Http\View\Composers;

use App\Models\Social;
use App\Models\Contacts;
use App\Models\Navigation;
use Illuminate\View\View;

class SharedComposer
{
    protected $social;

    protected $contacts;

    protected $navigation;

    public function __construct(Social $social, Contacts $contacts, Navigation $navigation)
    {
        $this->social = $social;
        $this->contacts = $contacts;
        $this->navigation = $navigation;
    }
    /**
     *
     * @param  \Illuminate\View\View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view
            ->with('social', $this->social::all())
            ->with('contacts', $this->contacts::all())
            ->with('navigation', $this->navigation::all());
    }
}