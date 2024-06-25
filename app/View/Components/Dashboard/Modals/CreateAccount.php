<?php

namespace App\View\Components\Dashboard\Modals;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CreateAccount extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(public string $title, public bool $isAdmin = false)
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('dashboard.components.modals.create-account');
    }
}
