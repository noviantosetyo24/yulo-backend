<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Button extends Component
{
    /**
     * Create a new component instance.
     */
    public $type;
    public $class;
    public $rowclass;
    public $label;
    public $attr;

    public function __construct(
        $type = 'button',
        $label = 'Submit',
        $class = 'success',
        $rowclass = '',
        $attr = [],
    ) {
        $this->type = $type;
        $this->label = $label;
        $this->class = $class;
        $this->rowclass = $rowclass;
        $this->attr = $attr;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.button');
    }
}
