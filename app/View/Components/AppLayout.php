<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;
use Illuminate\Http\Request;

class AppLayout extends Component
{
    public $logoutPath;

    public function __construct($logoutPath)
    {
        $this->logoutPath = $logoutPath;
        // dd($logoutPath);
    }
    /**
     * Get the view / contents that represents the component.
     */
    public function render(): View
    {
        return view('layouts.app');
    }
}
