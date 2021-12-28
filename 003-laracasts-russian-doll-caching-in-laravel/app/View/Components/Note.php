<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Note extends Component
{
    public \App\Models\Note $note;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(\App\Models\Note $note)
    {
        $this->note = $note;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.note');
    }
}
