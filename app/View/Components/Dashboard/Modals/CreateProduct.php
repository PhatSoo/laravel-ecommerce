<?php

namespace App\View\Components\Dashboard\Modals;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CreateProduct extends Component
{
    public $categories;
    /**
     * Create a new component instance.
     */
    public function __construct(public string $title, $categories)
    {
        $this->categories = $categories;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('dashboard.components.modals.create-product');
    }
}