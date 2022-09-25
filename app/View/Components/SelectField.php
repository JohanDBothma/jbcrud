<?php

namespace App\View\Components;

use App\Models\Interest;
use App\Models\Language;
use Illuminate\View\Component;

class SelectField extends Component
{
    public $icon;
    public $name;
    public $placeholder;
    public $error;
    public $options;
    public $multiselect;

    /**
     * Create a new component instance.
     *
     * @return void
     */

    public function __construct($icon, $name, $placeholder, $error, $multiselect, $options)
    {
        $this->icon = $icon;
        $this->name = $name;
        $this->placeholder = $placeholder;
        $this->error = $error;
        $this->multiselect = $multiselect == "true" ? true : false;


        $languages = Language::get();
        $interests = Interest::get();
        $this->options = $options == "languages" ? $languages : $interests;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.select-field');
    }
}
