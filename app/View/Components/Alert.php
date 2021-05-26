<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Alert extends Component
{
    /**
     * Тип предупреждения.
     *
     * @var string
     */
    public $text;
    
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($text)
    {
        $this->text = $text;
    }


    // Исключить из шаблона
    // protected $except = ['isShow'];

    public function isShow($bool)
    {
        return $bool;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        // return view('components.alert');
        return function (array $data) {
            // dd($data);

            return 'components.alert';
        };
    }
}
