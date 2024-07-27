<?php

namespace App\View\Components\Admin;

use Illuminate\View\Component;

class Card extends Component
{
    public $title;
    public $description;
    public $link;

    public function __construct($title, $description, $link)
    {
        $this->title = $title;
        $this->description = $description;
        $this->link = $link;
    }

    public function render()
    {
        return view('components.admin.card');
    }
}

