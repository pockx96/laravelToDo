<?php

namespace App\Livewire;

use Livewire\Component;

class Main extends Component
{
    public $welcome = "Bienvenido, estas son tus tareas";

    public function render()
    {
        return view('livewire.main');
    }
}
