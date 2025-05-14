<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Input extends Component
{
    /**
     * Create a new component instance.
     */
    public $label;
    public $name;
    public $type;
    public $class;
    public $rowclass;
    public $wiremodel;
    public $accept;
    
    public function __construct(
        $label,
        $name = 'input',
        $type = 'text',
        $rowclass = '',
        $class = '',
        $wiremodel = '',
        $accept = '',
    ) {
        $this->label = $label;
        $this->name = $name;
        $this->type = $type;
        $this->rowclass = $rowclass;
        $this->class = $class;
        $this->wiremodel = $wiremodel;
        $this->accept = $accept;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.input');
    }
}
