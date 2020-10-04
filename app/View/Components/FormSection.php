<?php

namespace App\View\Components;

use Illuminate\View\Component;

class FormSection extends Component
{
    public $method;

    /**
     * Create a new component instance.
     * 
     * @param  string  $method
     * @return void
     */
    public function __construct($method)
    {
        $this->method = $method;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.form-section');
    }
}
