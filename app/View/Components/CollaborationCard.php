<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CollaborationCard extends Component
{
    public $id;
    public $title;
    public $startDate;
    public $endDate;
    public $domicile;
    public $imagePath;

    /**
     * Create a new component instance.
     */
    public function __construct(string $id, string $title, string $startDate, string $endDate, string $domicile, string $imagePath = null)
    {
        $this->id = $id;
        $this->title = $title;
        $this->startDate = $startDate;
        $this->endDate = $endDate;
        $this->domicile = $domicile;
        $this->imagePath = $imagePath;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.collaboration-card');
    }
}
