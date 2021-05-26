<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ScrollUp extends Component
{
    /**
     * Path to sprites
     *
     * @var string
     */
    public $sprites;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($sprites)
    {
        $this->sprites = $sprites;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        // return view('components.scroll-up');
        return function (array $data) {
            // dd($data);

            return 'components.scroll-up';
        };
    }
}
