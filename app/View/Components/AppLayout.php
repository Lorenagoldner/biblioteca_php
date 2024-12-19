<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class AppLayout extends Component
{
    /**
     * Retorna a visualização principal do layout da aplicação.
     */
    public function render(): View
    {
        return view('layouts.app');
    }
}
