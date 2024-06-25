<?php

namespace App\View\Components\Dashboard\Tables;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ListAccount extends Component
{
    public $accounts;
    /**
     * Create a new component instance.
     */
    public function __construct($accounts)
    {
        $this->accounts = $accounts;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('dashboard.components.tables.list-account');
    }
}