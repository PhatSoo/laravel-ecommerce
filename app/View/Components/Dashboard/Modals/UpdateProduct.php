<?php

namespace App\View\Components\Dashboard\Modals;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class UpdateProduct extends Component
{
    public $productInfo;
    public $title;
    public $key;
    public $categories;
    /**
     * Create a new component instance.
     */
    public function __construct($title, $productInfo, $key, $categories)
    {
        $this->title = $title;
        $this->productInfo = $productInfo;
        $this->key = $key;
        $this->categories = $categories;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('dashboard.components.modals.update-product');
    }
}
