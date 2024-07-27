<?php

namespace App\Livewire;

use Livewire\Component;

class TestComponent extends Component
{

    public function handleClick()
    {
        dump('test');
    }
    public function render()
    {
        return view('livewire.test-component');
    }
}
