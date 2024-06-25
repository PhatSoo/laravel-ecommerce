<?php

namespace App\View\Components\Dashboard\Tables;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ListCategory extends Component
{
    public $categories;
    /**
     * Create a new component instance.
     */
    public function __construct($categories)
    {
        $this->categories = $categories;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('dashboard.components.tables.list-category');
    }
}
