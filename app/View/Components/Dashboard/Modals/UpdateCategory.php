<?php

namespace App\View\Components\Dashboard\Modals;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class UpdateCategory extends Component
{
    public $categoryInfo;
    public $title;
    public $key;
    /**
     * Create a new component instance.
     */
    public function __construct($title, $categoryInfo, $key)
    {
        $this->title = $title;
        $this->categoryInfo = $categoryInfo;
        $this->key = $key;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('dashboard.components.modals.update-category');
    }
}