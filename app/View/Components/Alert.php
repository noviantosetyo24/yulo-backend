<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Alert extends Component
{
    /**
     * Create a new component instance.
     */
    public $message;
    public $rowclass;
    public $class;

    public function __construct(
        $message,
        $rowclass = '',
        $class = ''
    ) {
        $this->message = $message;
        $this->rowclass = $rowclass;
        $this->class = $class;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.alert');
    }
}
