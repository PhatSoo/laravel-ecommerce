<?php

namespace App\View\Components\Dashboard\Modals;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class UpdateAccount extends Component
{
    public $accountInfo;
    public $title;
    public $key;
    /**
     * Create a new component instance.
     */
    public function __construct($title, $accountInfo, $key)
    {
        $this->title = $title;
        $this->accountInfo = $accountInfo;
        $this->key = $key;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('dashboard.components.modals.update-account');
    }
}